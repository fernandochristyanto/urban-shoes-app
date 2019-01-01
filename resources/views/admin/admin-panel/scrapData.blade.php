@extends('shared._adminLayout')
@section('title')
  Review Scrap Data
@endsection

@section('js')
<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function() {
  const $tblItems = $('.tblItemLinks');
  $tblItems.on('click', '.btnActive', e => {
    const apiEndpoint = "{{route('_scraprequest.updatestatus')}}";
    const $btn = $(e.target);
    const $row = $btn.closest('tr');
    const id = $row.find('.iID').text();
    const status = $btn.attr('newstatus');
    return $.ajax({
      url: `${apiEndpoint}`,
      method: 'POST',
      data: {id: id, status: status},
      dataType: 'JSON',
      beforeSend: () => {
        $btn.prop('disabled', true);
      },
      complete: (xhr, text) => {
        $btn.prop('disabled', false);

        if(xhr.status == '200') {
            if(status == 'A')
              $btn.removeClass('btnSecondary').addClass('btnOK').text('Active').attr('newstatus', 'I');
            else if (status == 'I')
            $btn.removeClass('btnOK').addClass('btnSecondary').text('Inactive').attr('newstatus', 'A');
        } else {
            console.log(text);
        }
      }
    });
  });
  $('#btnFinalize, #btnDiscard').on('click', function(e) {
    const apiEndpoint = "{{route('_scraprequest.updaterequeststatus')}}";
    const $btn = $(e.target);
    const id = $('#spanID').text();
    var approval_status = 'F';
    var finalized = 1;
    if(e.target == $('#btnDiscard')[0]) {
        approval_status = 'D';
        finalized = 0;
    }

    return $.ajax({
      url: `${apiEndpoint}`,
      method: 'POST',
      data: {id: id, approval_status: approval_status, finalized: finalized},
      dataType: 'JSON',
      beforeSend: () => {
        $btn.prop('disabled', true);
      },
      complete: (xhr, text) => {
        $btn.prop('disabled', false);
        if(xhr.status == '200') {
            window.location.reload();
        } else {
            console.log(text);
        }
      }
    });
  });
});
</script>
@endsection

@section('content')
<h3 class="uppercase">Reviewing {{$scrap_request->name}}</h3>
<h5 class="uppercase">Price threshold : {{$scrap_request->min_price_threshold}}</h5>
<i>{{$scrap_request->description}}</i>
<br>
<br>
@if($scrap_request->approval_status == 'F' && $scrap_request->finalized == 0)
<div id="btnPanel">
    <span id="spanID" style="display: none;">{{$scrap_request->id}}</span>
    <button class="btnOK" id="btnFinalize">Finalize</button>
    <button class="btnNO" id="btnDiscard">Discard</button>
</div>
@endif
@foreach ($shops as $shop)
<h5 class="uppercase">Scrap Data from {{$shop->name}}</h5>
<table class="tblItemLinks" shop="{{$shop->id}}">
    <thead>
        <tr>
            <th>Shop Name</th>
            <th>Item Link</th>
            <th>Price</th>
            <th>Rating</th>
            @if($scrap_request->approval_status == 'F' && $scrap_request->finalized == 0)
                <th></th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($scrapped_shoes[$shop->id] as $scrapped_shoe)
        <tr class="dataRow">
            <td class="iID" style="display: none">{{$scrapped_shoe->id}}</td>
            <td class="iShop">{{$scrapped_shoe->seller}}</td>
            <td class="iLink"><a href="{{$scrapped_shoe->store_url}}">{{$scrapped_shoe->store_url}}</a></td>
            <td class="iPrice">{{$scrapped_shoe->price}}</td>
            <td class="iRating">{{$scrapped_shoe->rating}}</td>
            @if($scrap_request->approval_status == 'F' && $scrap_request->finalized == 0)
            <td class="iAction">
                @if($scrapped_shoe->status == 'A')
                    <button class="btnOK wire btnActive" newstatus="I">Active</button>
                @elseif($scrapped_shoe->status == 'I')
                    <button class="btnSecondary wire btnActive" newstatus="A">Inactive</button>
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endforeach
@endsection