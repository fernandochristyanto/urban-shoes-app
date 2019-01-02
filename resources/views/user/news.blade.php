@extends('shared._adminLayout')
@section('title')
  News
@endsection

@section('content')
  @foreach ($articles as $article)
    <div>
      <h1>{{$article->title}}</h1>
      <p>{{$article->contents}}</p>
    </div>
  @endforeach
@endsection

@section('js')
    <script type="text/javascript">
      
    </script>
@endsection