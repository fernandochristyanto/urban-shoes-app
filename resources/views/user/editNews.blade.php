@extends('shared._adminLayout')
@section('title')
  Update News
@endsection

@section('css')
	<style type="text/css">
		.input-group{
			width: 100%;
		}
	</style>
@endsection

@section('content')
<br>
<button onclick="backToNews()">< Back</button>
<form method="POST" action="{{route('news.update')}}" enctype="multipart/form-data">
	{{csrf_field()}}
    <input type="hidden" name="id" value="{{$article->id}}">
	<div class="input-group">
        <label for="item_name">Title</label>
        <input type="text" name="title" placeholder="e.g YEEZY SAVED MY LIFE *not clickbait*" value="{{$article->title}}">
    </div>
    <div class="input-group">
        <label for="item_name">Contents</label>
        <textarea class="form-control" name="contents">{{$article->contents}}</textarea>
    </div>
    <div class="input-group">
        <label for="img_url">Article Image</label>
        <input id="img_url" type="file" name="img_url">
    </div>
    <div class="input-group">
        <input type="submit" value="Update News">
    </div>
</form>
@endsection

@section('js')
	<script type="text/javascript">
		function backToNews(){
			window.location.href = "{{route('news')}}";
		}
	</script>
@endsection