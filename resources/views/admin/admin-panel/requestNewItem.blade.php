@extends('shared._adminLayout')
@section('title')
  Request New Item
@endsection

@section('content')
<form action="{{route('scraprequest.store')}}" method="post">
    {{csrf_field()}}
    <div class="input-group">
        <label for="item_name">Item Name</label>
        <input type="text" name="name" placeholder="e.g Yeezy 700 V2 Static">
    </div>
    <div class="input-group">
        <label for="item_name">Item Description</label>
        <input type="text" name="description" placeholder="Short description of the item">
    </div>
    <div class="input-group">
        <label for="item_name">Price Threshold</label>
        <input type="text" name="min_price_threshold" placeholder="How much do you think the item should be worth?">
    </div>
    <input type="submit" value="Request New Item">
</form>
@endsection