@extends('layouts.base')
@section('navbaar')
<head>
    <link rel="stylesheet" type="text/css" href="{{URL('css/customerProfile.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT&family=Stint+Ultra+Condensed&display=swap" rel="stylesheet">
    </head>
  <div class="container">
    <div class="row">
        <div class="col">
            <br><br><div class="content">
             <span class="customerName">{{ Session::get('LoggedCustomer') }}</span>
             <a href="{{ route('custauth.logout')}}"><span class="LOGOUT">Logout</span></a>
            </div><hr><br>
             <br> <div class="order_list">
                <span class="OrderHistory">Order History</span>
            </div>
        </div>
    </div>
  </div>
@endsection
