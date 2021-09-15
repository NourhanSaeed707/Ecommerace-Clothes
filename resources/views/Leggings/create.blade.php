@extends('layout.baseAdmin')
@section('navbaar')
   <head>
    <link rel="stylesheet" type="text/css" href="{{URL('css/baseAdmin.css')}}">
   </head>
   <body>
    <div class="form_womencreate container-fluid">

    <br><br><form class="form_create" action="{{route('leggings.store')}}" enctype="multipart/form-data" method="post" >
        @csrf
        @if(session()->has('message'))
            <div class="alert alert-success">
               {{ session()->get('message') }}
            </div>
        @endif
        <div class="mb-3">
            <label for="exampleInputid" class="form-label">Product Code</label>
            <input type="text" class="form-control" name="productCode" id="exampleInputid" aria-describedby="idHelp">
            @foreach ($errors->get('productCode') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputname" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputname" aria-describedby="nameHelp">
            @foreach ($errors->get('name') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputprice" class="form-label">Product Price</label>
            <input type="text" class="form-control" name="price" id="exampleInputprice" aria-describedby="priceHelp">
            @foreach ($errors->get('price') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputdiscount" class="form-label">Product Discount</label>
            <input type="text" class="form-control" name="discount" id="exampleInputdiscount" aria-describedby="discountHelp">
            @foreach ($errors->get('discount') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputsmall" class="form-label">Number of small sizes</label>
            <input type="text" class="form-control" name="small" id="exampleInputsmall" aria-describedby="smallHelp">
            @foreach ($errors->get('small') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputmedium" class="form-label">Number of medium sizes</label>
            <input type="text" class="form-control" name="medium" id="exampleInputmedium" aria-describedby="mediumHelp">
            @foreach ($errors->get('medium') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputlarge" class="form-label">Number of large sizes</label>
            <input type="text" class="form-control" name="large" id="exampleInputlarge" aria-describedby="largeHelp">
            @foreach ($errors->get('large') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputxl" class="form-label">Number of xl sizes</label>
            <input type="text" class="form-control" name="xl" id="exampleInputxl" aria-describedby="xlHelp">
            @foreach ($errors->get('xl') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputcolor" class="form-label">Color 1</label>
            <!-- <input type="text" class="form-control" name="color" id="exampleInputcolor" aria-describedby="colorHelp"> -->
            <input type="file" class="form-control" name="Colorimg1" id="exampleInputimage" multiple>
            @foreach ($errors->get('color') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="exampleInputimage" class="form-label">Image 1</label>
            <input type="file" class="form-control" name="image1" id="exampleInputimage"  multiple="multiple">
        </div>

        <div class="mb-3">
            <label for="exampleInputcolor" class="form-label">Color 2</label>
            <!-- <input type="text" class="form-control" name="color" id="exampleInputcolor" aria-describedby="colorHelp"> -->
            <input type="file" class="form-control" name="Colorimg2" id="exampleInputimage" multiple>
            @foreach ($errors->get('color') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="exampleInputimage" class="form-label">Image 2</label>
            <input type="file" class="form-control" name="image2" id="exampleInputimage"  multiple="multiple">
        </div>

        <div class="mb-3">
            <label for="exampleInputcolor" class="form-label">Color 3</label>
            <!-- <input type="text" class="form-control" name="color" id="exampleInputcolor" aria-describedby="colorHelp"> -->
            <input type="file" class="form-control" name="Colorimg3" id="exampleInputimage" multiple>
            @foreach ($errors->get('color') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="exampleInputimage" class="form-label">Image 3</label>
            <input type="file" class="form-control" name="image3" id="exampleInputimage"  multiple="multiple">
        </div>

        <div class="mb-3">
            <label for="exampleInputcolor" class="form-label">Color 4</label>
            <!-- <input type="text" class="form-control" name="color" id="exampleInputcolor" aria-describedby="colorHelp"> -->
            <input type="file" class="form-control" name="Colorimg4" id="exampleInputimage" multiple>
            @foreach ($errors->get('color') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="exampleInputimage" class="form-label">Image 4</label>
            <input type="file" class="form-control" name="image4" id="exampleInputimage"  multiple="multiple">
        </div>
        
        <!-- <div class="mb-3">
            <label for="exampleInputcolor" class="form-label">Colors</label>
            <input type="text" class="form-control" name="color" id="exampleInputcolor" aria-describedby="colorHelp">
            @foreach ($errors->get('color') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleInputimage" class="form-label">Images</label>
            <input type="file" class="form-control" name="image[]" id="exampleInputimage" multiple>
            @foreach ($errors->get('image') as $message)
              <div class="alert alert-danger">{{ $message }}</div>
            @endforeach
        </div> -->

        <button type="submit" class="btn btn-dark">Submit</button>
      </form><br><br>
    </div>
   </body>
@endsection
