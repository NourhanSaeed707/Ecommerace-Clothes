@extends('layout.baseAdmin')
@section('navbaar')
   <head>
    <link rel="stylesheet" type="text/css" href="{{URL('css/baseAdmin.css')}}">
   </head>
   <body>
    <div class="form_womensearch container-fluid">
        <br><br><br><br><br><form class="form_create" action="{{route('tops.edit')}}" enctype="multipart/form-data" method="get">
            @csrf
            <div class="mb-3">
                <label for="exampleInputid" class="form-label">Product Code</label>
                <input type="text" class="form-control" name="productCode" id="exampleInputid" aria-describedby="idHelp">
            </div>
            <button type="submit" class="btn btn-dark">Search</button>
        </form><br><br><br><br><br><br><br>
    </div>
   </body>
@endsection
