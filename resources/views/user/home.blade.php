@extends('shared._adminLayout')

@section('title')
  Home
@endsection

@section('css')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
@endsection
@section('content')
  
<div id="carousel">
    <div class="container carouselFirst">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active">
            <img src={{asset('shoes/wp1.jpg')}} alt="A" style="width:1150px;">
          </div>

          <div class="item">
            <img src={{asset('shoes/wp2.jpg')}} alt="B" style="width:1150px;">
          </div>
        
          <div class="item">
            <img src={{asset('shoes/wp3.jpg')}} alt="C" style="width:1150px;">
          </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
</div>

<div class="latest_release">
    
    <div class="container">
        <div>
            <h2 class="txtLatest">Latest Release</h2>
        </div>

        <div class="imagesOfLast">
          
              <div class="col-xs-12">
                @foreach($shoes as $shoe)
                  <div class="col-xs-4">
                    <img src={{asset('shoes/' . $shoe->image_url)}} width="300px" style="margin-left:-10%;">
                    <h3>{{$name = $shoe->name}}</h3>
                  </div>
                @endforeach
              </div>
        </div>    
    </div>

</div>

<div class="mostViewed">
    
    <div class="container">
        <div>
            <h2 class="txtMV">Most Viewed Sneakers</h2>
        </div>

        <div class="imagesOfMV">
          
            <div class="col-xs-12">
              @foreach($shoes as $shoe)
                <div class="col-xs-4">
                  <img src={{asset('shoes/' . $shoe->image_url)}} width="300px" style="margin-left:-10%;">
                  <h3>{{$name = $shoe->name}}</h3>
                </div>
              @endforeach
            </div>
        
        </div>    
    </div>

</div>

<div id="footer">
      
      <div class="container">    
        <div id="contact" class="container-fluid bg-grey">
          <h3 class="text-center" style="margin-left: -4%; ">CONTACT</h3>
          <div class="row">
            <div class="col-sm-5">
              <p>Contact us and we'll get back to you within 24 hours.</p>
              <p><span class="glyphicon glyphicon-map-marker"></span> Jakarta, Ind</p>
              <p><span class="glyphicon glyphicon-phone"></span> +089636173059</p>
              <p><span class="glyphicon glyphicon-envelope"></span> marketing@urbansneakers.com</p>
            </div>
            <div class="col-sm-7 slideanim">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <input class="form-control" id="name" name="name" placeholder="Name" type="text" required style="width:80%;">
                </div>
                <div class="col-sm-6 form-group">
                  <input class="form-control" id="email" name="email" placeholder="Email" type="email" required style="margin-left:-25%;">
                </div>
              </div>
              <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5" style="width:88%;"></textarea><br>
              <div class="row">
                <div class="col-sm-12 form-group" style="margin-left: -11%;">
                  <button class="btn btn-default pull-right" type="submit">Send</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

</div>
@endsection