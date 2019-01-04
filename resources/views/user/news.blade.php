@extends('shared._adminLayout')
@section('title')
  News
@endsection

@section('content')
	<a href="{{route('news.create')}}">Add News</a>
	@if(isset($articles))
  	@foreach ($articles as $article)
	    <div id="news-list">
	      <h1>{{$article->title}}</h1>
	      <p>{{$article->contents}}</p>
	    </div>
  	@endforeach
  	<button onclick="moreNews();">More News</button>
  	@endif
@endsection

@section('js')
    <script type="text/javascript">
    	currTotal = 5;
		function moreNews(){
			$.ajax({
				type : "GET",
				url : "{{route('news.more')}}",
				dataType : "json",
				data : {currTotal : currTotal},
				success : function(response){
					appendNews(response);
					currTotal += 5;
				}
			});
		}

		function appendNews(articles){
			temp = "";
			for (var i = 0; i < articles.length; i++) {
				temp += "<h1>" + articles[i].title + "</<h1>"
					+ "<p>" + articles[i].contents + "</p>";
			}
			$("#news-list").append(temp);
		}
    </script>
@endsection