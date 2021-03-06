@extends('layouts.master')
@include('partials.header')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>User Profile</h1>
        <hr>
        <h2>My Ordered Test(s)</h2>
        @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($order->cart->items as $item)
                    <li class="list-group-item">
                    <span class="badge">R{{$item['price']}}</span>
                    {{ $item['item']['title'] }} | {{ $item['qty']}} Test(s).
                    </li>
                   @endforeach
                  </ul>
            </div>
            <div class="panel-footer">
                <strong>Total Price: ${{$order->cart->totalPrice}}</strong>
            </div>
          </div>
          @endforeach
          
    </div>
</div>
@endsection            