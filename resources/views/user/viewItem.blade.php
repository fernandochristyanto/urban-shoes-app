@extends('shared._adminLayout')
@section('title')
  View {{$shoe->name}}
@endsection

@section('js')

@endsection

@section('css')
<style>
    .iImage {
        width: 160px;
        height: 160px;
    }
</style>
@endsection

@section('content')
<h3 class="uppercase">Viewing {{$shoe->name}}</h3>
<i>{{$shoe->description}}</i>
<br>
<br>
@foreach ($shops as $shop)
<h5 class="uppercase">Links from {{$shop->name}}</h5>
<table class="tblItemLinks" shop="{{$shop->id}}">
    <thead>
        <tr>
            <th></th>
            <th>Price</th>
            <th>Rating</th>
            <th>Link</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shoe_shops[$shop->id] as $shoe_shop)
        <tr class="dataRow">
            <td class="iID" style="display: none">{{$shoe_shop->id}}</td>
            <td class="iImage"><img src="{{$shoe_shop->image_url}}" alt=""></td>
            <td class="iPrice">{{$shoe_shop->price}}</td>
            <td class="iRating">{{$shoe_shop->rating}}</td>
            <td class="iLink"><a href="{{$shoe_shop->store_url}}">{{$shoe_shop->store_url}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endforeach
@endsection