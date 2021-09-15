@extends('layouts.base')
@section('navbaar')
     <head>
         <title>Forgot Password</title>
         <link rel="stylesheet" type="text/css" href="{{URL('css/CustomerPassword.css')}}">
     </head>
     <br><br><br><form action="{{ route('custauth.password') }}" method="get">
        @csrf
        <div class="form-group">
            @if(Session::get('error'))
             <div class="alert alert-danger"> {{ Session::get('error') }}</div>
            @endif
            @if(Session::get('success'))
             <div class="alert alert-success"> {{ Session::get('success') }}</div>
            @endif
            <label class="labelEmail">Email</label>
            <input type="email" class="form-control" name="email"  >
            <span class="text-danger">@error('email'){{$message}}@enderror</span>
        </div>
        <br><button type="submit" class="BtnSubmit">Submit</button>
     </form><br><br><br>
@endsection
