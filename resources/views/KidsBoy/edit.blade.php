@extends('layout.baseAdmin')
@section('navbaar')
   <head>
    <link rel="stylesheet" type="text/css" href="{{URL('css/baseAdmin.css')}}">
   </head>
   <body>
    <div class="form_womencreate container-fluid">
    <br><br><form class="form_create" action="{{route('KidBoys.update')}}" method="get" enctype="multipart/form-data"  >
        @csrf
        @method('PUT')
        @if(session()->has('success'))
            <div class="alert alert-success">
               {{ session()->get('success') }}
            </div>
        @endif
        <div class="mb-3">
            <label for="exampleInputid" class="form-label">Product Code</label>
            <input type="text" class="form-control" name="productCode" id="exampleInputid" aria-describedby="idHelp" value="{{$data[0]->productid}}">
            @foreach ($errors->get('productCode') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputname" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputname" aria-describedby="nameHelp" value="{{$data[0]->name}}">
            @foreach ($errors->get('name') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputprice" class="form-label">Product Price</label>
            <input type="text" class="form-control" name="price" id="exampleInputprice" aria-describedby="priceHelp" value="{{$data[0]->price}}">
            @foreach ($errors->get('price') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputdiscount" class="form-label">Product Discount</label>
            <input type="text" class="form-control" name="discount" id="exampleInputdiscount" aria-describedby="discountHelp" value="{{$data[0]->discount}}">
            @foreach ($errors->get('discount') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputsmall" class="form-label">Number of small sizes</label>
            <input type="text" class="form-control" name="small" id="exampleInputsmall" aria-describedby="smallHelp" value="{{$data[0]->small}}">
            @foreach ($errors->get('small') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputmedium" class="form-label">Number of medium sizes</label>
            <input type="text" class="form-control" name="medium" id="exampleInputmedium" aria-describedby="mediumHelp" value="{{$data[0]->medium}}">
            @foreach ($errors->get('medium') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputlarge" class="form-label">Number of large sizes</label>
            <input type="text" class="form-control" name="large" id="exampleInputlarge" aria-describedby="largeHelp" value="{{$data[0]->large}}">
            @foreach ($errors->get('large') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputxl" class="form-label">Number of xl sizes</label>
            <input type="text" class="form-control" name="xl" id="exampleInputxl" aria-describedby="xlHelp" value="{{$data[0]->xl}}">
            @foreach ($errors->get('xl') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputcolor" class="form-label">Colors</label>
            <input type="text" class="form-control" name="color" id="exampleInputcolor" aria-describedby="colorHelp" value="{{$data[0]->color}}">
            @foreach ($errors->get('color') as $message)
               <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputimage" class="form-label">Images</label>
            <input type="file" class="form-control" name="image[]" id="exampleInputimage"  multiple value="{{$data[0]->image}}">
            @foreach ($errors->get('image') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form><br><br>
    </div>
   </body>
@endsection
