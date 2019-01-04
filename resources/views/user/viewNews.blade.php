@extends('shared._adminLayout')
@section('title')
  {{$title}}
@endsection

@section('content')
	<img src="{{asset('shoes/article-thumbnail').'/'.$img_url}}">
	<h1>{{$title}}</h1>
	<hr>
	<p>{{$contents}}</p>
	<button onclick="backToNews();">< Back</button>
@endsection

@section('js')
	<script type="text/javascript">
		function backToNews(){
			window.location.href = "{{route('news')}}";
		}
	</script>
@endsection