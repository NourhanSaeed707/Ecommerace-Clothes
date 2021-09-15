@extends('layout.baseAdmin')
@section('navbaar')
   <head>
    <link rel="stylesheet" type="text/css" href="{{URL('css/baseAdmin.css')}}">
   </head>
   <body>
    <div class="form_womendelete container-fluid"><br>
        @if(session()->has('success'))
            <div class="alert alert-success">
                   {{ session()->get('success') }}
             </div>
        @endif
        <br><br><br><br><br><form class="form_create" method="get" action="{{route('tops.delete')}}" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label for="exampleInputid" class="form-label">Product Code</label>
                <input type="text" class="form-control" name="productCode" id="exampleInputid" aria-describedby="idHelp">
            </div>
            <button type="submit" class="btn btn-dark">delete</button>
        </form><br><br><br><br><br><br><br>
    </div>
   </body>
@endsection
