@extends('layout.baseAdmin')
@section('navbaar')
   <head>
    <link rel="stylesheet" type="text/css" href="{{URL('css/baseAdmin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL('css/AdminLogin.css')}}">
   </head>
   <body>
       <div class="backgroundAdminHome">
           {{-- <img src="/images/admin/back8.jpg" alt="backgroundPhoto"> --}}
           <h2 data-text="Admin...">Admin...</h2>
       </div>
   </body>
@endsection
