
@extends('layouts.base')
@section('navbaar')
 <head>
    <link rel="stylesheet" type="text/css" href="{{URL('css/customerLogin.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT&family=Stint+Ultra+Condensed&display=swap" rel="stylesheet">
    </head>

    <br><br><br> <div class="container">
         <div class="row">
         <div class="col">
             <span class="Title">Customer Login</span><hr>

           <br> <form action="{{ route('custauth.remember') }}" method="post">
            @if(Session::get('fails'))
              <div class="alert alert-danger">
                  {{ Session::get('fails') }}
              </div>
            @endif
            @csrf
              <div class="form-group">
                  <label class="labelEmail">Email</label>
                  <input type="text" class="form-control" name="email" >
                  <span class="text-danger">@error('email'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <label class="labelPassword">Password</label>
                <input type="password" class="form-control" name="password" >
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
                <input  type="checkbox"  name="remember"  >
                <label class="labelremember">Remember me</label>
                <a href="{{ route('custauth.forget') }}" class="p-5">Forget Password</a>
                <a href="{{ route('custauth.register') }}" class="p-5">Sign Up</a>
            </div>

            <input type="submit" value="Login" name="LoginBtn">
            </form>
         </div>
         </div>
     </div><br><br><br>
@endsection

