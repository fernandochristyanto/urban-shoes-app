@extends('shared._adminLayout')
@section('title')
  Request New Item
@endsection

@section('content')
<form action="{{route('scraprequest.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="input-group">
        <label for="item_name">Item Name</label>
        <input type="text" name="name" placeholder="e.g Yeezy 700 V2 Static">
        @if($errors->has('name'))
            <span id="error" style="color: red">{{$errors->first('name')}}</span>
        @endif
    </div>
    <div class="input-group">
        <label for="item_name">Item Description</label>
        <input type="text" name="description" placeholder="Short description of the item">
        @if($errors->has('description'))
            <span id="error" style="color: red">{{$errors->first('description')}}</span>
        @endif
    </div>
    <div class="input-group">
        <label for="item_name">Price Threshold</label>
        <input type="text" name="min_price_threshold" placeholder="How much do you think the item should be worth?">
        @if($errors->has('min_price_threshold'))
            <span id="error" style="color: red">{{$errors->first('min_price_threshold')}}</span>
        @endif
    </div>
    <div class="input-group">
        <label for="img_url">Shoe Image</label>
        <input id="img_url" type="file" name="img_url">
    </div>
    <div class="input-group">
        <input type="submit" value="Request New Item">
    </div>
</form>
@endsection