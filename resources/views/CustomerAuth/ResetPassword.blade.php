@extends('layouts.base')
@section('navbaar')
     <head>
         <title>Forgot Password</title>
         <link rel="stylesheet" type="text/css" href="{{URL('css/CustomerPassword.css')}}">
     </head>
     <br><br><br><form action="{{ route('custauth.setNewPassword') }}" method="post">
        @csrf
        <div class="form-group">
            @if(Session::get('error'))
             <div class="alert alert-danger"> {{ Session::get('error') }}</div>
            @endif
            @if(Session::get('success'))
             <div class="alert alert-success"> {{ Session::get('success') }}</div>
            @endif
            @if(Session::get('hash'))
            <div class="alert alert-danger"> {{ Session::get('hash') }}</div>
           @endif

            <label class="labelEmail">Email</label>
            <input type="email" class="form-control" name="email" >
            <span class="text-danger">@error('email'){{$message}}@enderror</span>
            <br><label class="labelpassword">Password</label>
            <input type="password" class="form-control" name="password"  >
            <span class="text-danger">@error('password'){{$message}}@enderror</span>
            <br><label class="labelpassword">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password"  >
            <span class="text-danger">@error('confirm_password'){{$message}}@enderror</span>
        </div>
        <br><button type="submit" class="BtnSubmit">Submit</button>
     </form><br><br><br>
@endsection
