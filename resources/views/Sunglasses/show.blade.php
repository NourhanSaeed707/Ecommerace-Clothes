@extends('layout.base')
@section('navbaar')
   <head>
     <!-- css files -->
    <link rel="stylesheet" type="text/css" href="{{URL('css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL('css/womanShow.css')}}">
     <!-- fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    </head>
   <body>
    
     <br><br><br> <div class="container">
          <div class="row   justify-content-between">
              <div class="col-md-6 image_side">
                <?php
                  if($sunglasses[0]['image'] != ""){
                    $pieces = explode(',',$sunglasses[0]['image']);}
                ?>
                <img src="/images/sunglasses/clothes/{{$pieces[0]}}" alt="cloth" width="100%" height="100%">
              </div> <!-- image_side -->
              <div class="col-md-5 info_side">
                <div class="item clothname">{{$sunglasses[0]['name']}}</div><br>
                <div class="pricetotal">
                @if( $sunglasses[0]['price']  != $sunglasses[0]['total'] )
                <strike class="item clothprice"style="color:red">{{$sunglasses[0]['price']}}$</strike>
                <div class="item clothtotal ">{{$sunglasses[0]['total']}}$</div><br>
                @else
                <div class="item clothprice">{{$sunglasses[0]['price']}}$</div><br><br>
                @endif
                </div>
                <br><form action="/sunglassesclotheaddToCard/{{$sunglasses[0]['productid']}}/{{$pieces[0]}}"  method="post">
                  @csrf
                  
                  <br><label class="quantitylabe" name="quantity">Quantity</labe>
                  <input type="number" class="quantityInput" value='1' min="1" name="quantity"><br><br>
                  <input type="submit" value="Add To Card" class="btnAddToCard" >
                  </form>
             </div><!-- info-col -->
          </div><!-- row product_info -->
      </div><br><br><br><br><br><br>
   

</body>
@endsection
