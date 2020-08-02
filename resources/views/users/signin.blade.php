@extends('layouts.master')
@include('partials.header')
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Login</h1>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
        <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    <form action="{{route('users.signin')}}" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        {{csrf_field()}}
        </form>
    <p>Don't have an account? <a href="{{route('users.signup')}}">Register instead!</a></p>

    </div>
</div>
@endsection