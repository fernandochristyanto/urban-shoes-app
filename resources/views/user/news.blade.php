@extends('shared._adminLayout')
@section('title')
  News
@endsection

@section('css')
	<style type="text/css">
		.news-icon{
			margin-top: 10px;
			width: 20px; 
			height: 20px;
			float: right;
			cursor: pointer;
		}

		.news-title{
			font-size: 35px;
			float: left;
		}

		.news{
			display: flex;
			flex-direction: column;
			padding-bottom: 5px;
		}

		.news:hover{
			background-color: lightgrey;
			transition: .5s;
			cursor: pointer;
		}

		.news-content{
			display: flex;
			flex-direction: column;
			padding: 0px 10px;
		}

		.news-image{
			width: 100%;
			height: 600px;
		}
	</style>
@endsection

@section('content')
	<br>
	<div>
		<button onclick="addNews();">Add News</button>
	</div>
	<br>
	 <div id="news-list">
  	@foreach ($articles as $article)   
	      <div class="news">
	      	<img src="{{asset('shoes/article-thumbnail').'/'.$article->img_url}}" class="news-image" onclick="viewNews('{{$article->id}}');">
	      	<div class="news-content">
	      		<div class="news-header">
  		      		<span class="news-title">{{$article->title}}</span> 
  		      		<img src="{{asset('res/edit-icon.png')}}" class="news-icon" onclick="editNews('{{$article->id}}');">
  		      		<img src="{{asset('res/delete-icon.png')}}" class="news-icon" onclick="deleteNews('{{$article->id}}');">
  		      	</div>
  		      	<hr>
  		      	@if(str_word_count($article->contents) > 70)
  		      	<p>{{implode(' ', array_slice(explode(' ', $article->contents), 0, 70))}}...</p>
  		      	@else
  		      	<p>{{$article->contents}}</p>
  		      	@endif 
  		    </div>
	      </div>
	      <br>   
  	@endforeach
  	</div>
  	<button onclick="moreNews();">More News</button>
@endsection

@section('js')
    <script type="text/javascript">
    	function addNews(){
    		window.location.href = "{{route('news.create')}}";
    	}
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
			for (var i = currTotal; i < articles.length+currTotal; i++) {
				temp += "<h1>" + articles[i].title + "</<h1>"
					+ "<p>" + articles[i].contents + "</p>";
			}
			$("#news-list").append(temp);
		}

		function deleteNews(id){
			$.ajax({
				type : "POST",
				url : "{{route('news.delete')}}",
				dataType : "json",
				data : {id : id, "_token" : "{{csrf_token()}}"},
				success : function(response){
					location.reload();
				}
			});
		}

		function editNews(id){

			window.location.href = "{{route('news.edit')}}?id="+id;
				
		}

		function viewNews(id){
			window.location.href = "{{route('news.view')}}?id="+id;
		}

    </script>
@endsection