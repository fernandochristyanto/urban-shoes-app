@extends('shared._adminLayout')
@section('title')
  Search
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {
    const $btnSearch = $('#btnSearch');
    $('#sidebar').removeClass('out');
    $btnSearch.on('click', function() {
        $btnSearch.prop('disable', true);
        $btnSearch.fadeOut(100, () => {
            $btnSearch.siblings('.loader').removeClass('inactive');
            $('.search-item-card').remove();
            const apiEndpoint = "{{route('search.query')}}";
            var name = $('#txtName').val();
            var pricemin = parseInt($('#txtPriceMin').val());
            var pricemax = parseInt($('#txtPriceMax').val());
            if(isNaN(pricemin))
                pricemin = 0;
            if(isNaN(pricemax))
                pricemax = -1;
            // var marketplaces = $('#chkMarketplaces').find('input[type="checkbox"]').map((idx, obj) => {var k = {}; k[$(obj).val()] = $(obj).prop('checked'); return k;}).toArray();
            var sort    = $('#ddlSort').val();
            var sortDir = $('#chkSortDir').prop('checked') ? 1 : 0;
            var rating  = $('#chkRating').prop('checked') ? 1 : 0;
            return $.ajax({
                url: `${apiEndpoint}`,
                method: 'GET',
                data: {
                    name: name,
                    pricemin: pricemin,
                    pricemax: pricemax,
                    sort: sort,
                    sortDir: sortDir,
                    rating: rating
                },
                dataType: 'xml',
                beforeSend: () => {
                    $('#result').hide();
                    $('#no-data').hide();
                },
                complete: (xhr, text) => {
                    
                    $btnSearch.siblings('.loader').addClass('inactive');
                    $btnSearch.fadeIn(100);
                    $btnSearch.prop('disabled', false);
                    
                    if(xhr.status == '200') {
                        const data = JSON.parse(xhr.responseText);
                        if(data.length) {
                            for(i = 0 ; i < data.length ; i++) {
                                const $template = $('#card-template').clone().removeAttr('id').addClass('search-item-card').show();

                                $template.find('.name').text(data[i].name);
                                $template.find('.seller').text(data[i].seller);
                                $template.find('.rating').text(data[i].rating);
                                if(data[i].image_url)
                                    $template.find('img').attr('src', data[i].image_url);
                                $template.find('p').text(data[i].description);
                                var pricestring = "Rp. ";
                                pricestring += data[i].min_price;
                                pricestring += " - ";
                                pricestring += "Rp. ";
                                pricestring += data[i].max_price;
                                $template.find('.price').text(pricestring);
                                $template.find('.btnOK').attr('itemid', data[i].id);
                                $('#result').append($template);
                            }
                            $('#result').show();
                        } else {
                            $('#no-data').show();
                            $('#result').show();
                        }
                    } else {
                        console.log(text);
                    }
                }
            });
        });
    });
});
</script>
@endsection

@section('css')

@endsection

@section('content')
<div class="side out" id="sidebar">
    <span class="uppercase" style="padding: 10px">Search Menu</span>
    <div class="input-group">
        <label for="name">Shoe Name</label>
        <input type="text" name="name" id="txtName">
    </div>
    <div class="input-group">
        <label for="price">Minimum Price</label>
        <input type="number" name="pricemin" id="txtPriceMin" min="0">
    </div>
    <div class="input-group">
        <label for="price">Maximum Price</label>
        <input type="number" name="pricemax" id="txtPriceMax" min="0">
    </div>
    {{-- <div class="input-group checkboxes" id="chkMarketplaces">
        <label for="marketplace">Marketplaces</label>
        @foreach ($shops as $shop)
        <label><input type="checkbox" name="marketplace[]" value="{{$shop->id}}" checked=checked>{{$shop->name}}</label>
        @endforeach
    </div> --}}
    <div class="input-group">
        <label for="sort">Sort By</label>
        <select name="sort" id="ddlSort">
            <option value='1'>Date Added</option>
            <option value='2'>Price</option>
            <option value='3'>Rating</option>
        </select>
        <label><input type="checkbox" name="sortDir" value="1" checked=checked id="chkSortDir">Ascending</label>
    </div>
    <div class="input-group checkboxes">
        <label><input type="checkbox" name="4srating" value="1" id="chkRating">Min. 4★ Rating</label>
    </div>
    <div class="input-group">
        <button id="btnSearch">Search</button>
        <div class="loader inactive"></div>
    </div>
</div>
<div id="result" class="flexbox">
    <h1 id="no-data" style="display: none;">There are no items that match your criteria.</h1>
    <div id="card-template" style="display: none;">
        <div class="item-card-header">
            <span class="uppercase item-card name"></span>
            <span class="uppercase item-card seller"></span>
        </div>
        <div class="item-card-rating-container">
            <span class="uppercase item-card rating"></span>
        </div>
        <img src="{{ asset('res/no-img.png') }}" alt="">
        <p>

        </p>
        <div class="item-card-footer">
            <span class="uppercase item-card price"></span>
            <button class="btnOK">View Item Links</button>
        </div>
    </div>
</div>
@endsection