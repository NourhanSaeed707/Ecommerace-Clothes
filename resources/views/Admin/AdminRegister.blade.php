@extends('layout.baseAdmin')
@section('navbaar')
   <head>
    <link rel="stylesheet" type="text/css" href="{{URL('css/baseAdmin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL('css/AdminLogin.css')}}">
   </head>
   <body>
    <div class="container-fluid  fooorm">
    <div class=" form_createAdmin container-fluid">
        <br><br><form class="form_createAdmin" action="{{route('admin.store')}}" enctype="multipart/form-data" method="post" >
            @csrf
            @if(session()->has('success'))
                <div class="alert alert-success">
                   {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('registerMessage'))
            <div class="alert alert-danger">
               {{ session()->get('registerMessage') }}
            </div>
        @endif
            <div class="mb-3">
                <label for="exampleInputid" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="exampleInputid" aria-describedby="idHelp">
                @foreach ($errors->get('email') as $message)
                  <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputname" aria-describedby="nameHelp">
                @foreach ($errors->get('password') as $message)
                  <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            </div>
            <a href="#">Reset Password</a><br>
            <br><button type="submit" class="submit">Submit</button>
        </form><br><br><br><br>
    </div>
    </div>
   </body>
@endsection
