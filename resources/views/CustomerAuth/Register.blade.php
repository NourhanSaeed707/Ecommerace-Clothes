
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
           <span class="Title">Customer Sign Up</span><hr>
           <br> <form action="{{ route('custauth.save') }}" method="post">
            @if(Session::get('success'))
              <div class="alert alert-success">
                  {{ Session::get('success') }}
              </div>
            @endif
            @if(Session::get('fails'))
              <div class="alert alert-danger">
                  {{ Session::get('fails') }}
              </div>
            @endif
            @csrf
            <div class="form-group">
                <label class="labelName">Name</label>
                <input type="text" class="form-control" name="name">
                <span class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
              <div class="form-group">
                  <label class="labelEmail">Email</label>
                  <input type="text" class="form-control" name="email">
                  <span class="text-danger">@error('email'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <label class="labelPassword">Password</label>
                <input type="password" class="form-control" name="password">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>
            <a href="/Home"><input type="submit" value="Sign Up" name="SignUpBtn"></a>
            </form>
         </div>
         </div>
     </div><br><br><br>
@endsection

