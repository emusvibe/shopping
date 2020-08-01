@extends('layouts.master')
@section('title')
ComfortLabs Order Tests
@endsection
@include('partials.header')
@section('content')
@if(Session::has('success'))
<div class="row">
  <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
  <div id="charge-message" class="alert alert-success">
    {{Session::get('success')}}
  </div>
  </div>
</div>
@endif

<div class="container">
 @foreach($tests->chunk(3) as $testChunk)
  <div class="row">
  @foreach($testChunk as $test)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    <img src="{{$test->imagePath}}" alt="..." class="img-responsive"> 
         <div class="caption">
        <h3 class="price">{{$test->title}}</h3>
        <p class="description">{{$test->description}}</p>
        <div class="clearfix"> 
        <div class="pull-left price">R{{$test->price}}</div>
        <a href="{{route('test.addToCart', ['id' => $test->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a></div>
      </div>
    </div>
  </div>
  
  @endforeach
   
  </div>
  @endforeach

</div>
@endsection