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
                  if($menCloth[0]['image'] != ""){
                    $pieces = explode(',',$menCloth[0]['image']);}
                ?>
                <img src="/images/menClothes/clothes/{{$pieces[0]}}" alt="cloth" width="100%" height="100%">
              </div> <!-- image_side -->
              <div class="col-md-5 info_side">
                <div class="item clothname">{{$menCloth[0]['name']}}</div><br>
                <div class="pricetotal">
                @if( $menCloth[0]['price']  != $menCloth[0]['total'] )
                <strike class="item clothprice"style="color:red">{{$menCloth[0]['price']}}$</strike>
                <div class="item clothtotal ">{{$menCloth[0]['total']}}$</div><br>
                @else
                <div class="item clothprice">{{$menCloth[0]['price']}}$</div><br><br>
                @endif
                </div>
              <br><labe class="color_name">Color</label>
              <div class="color">
                  @if ($menCloth[0]['color']!= "")
                  @php
                     $c = 0;
                  @endphp
                        @foreach(explode(',', $menCloth[0]['color']) as $info) 
                        @if($info != "")
                        @php $c++ @endphp
                        <br><a  href="/manclotheshowc/{{$info}}/{{$menCloth[0]['productid']}}">
                        @if($c==1)
                          @php $color=$info @endphp
                           <br> <input type="image" src="/images/menClothes/color/{{$info}}" alt="color" width="42px" height="42px" class="colorWithBorder"><br><br>
                        @else
                        <br> <input type="image" src="/images/menClothes/color/{{$info}}" alt="color" width="42px" height="42px" class="colorWithoutBorder"><br><br>
                        @endif
                        </a> 
                        @endif
                        @endforeach
                  @endif
                </div><!-- color -->
                <br><form action="/manclotheaddToCard/{{$menCloth[0]['productid']}}/{{$pieces[0]}}/{{$color}}"  method="post">
                  @csrf
                  <label class="sizeLabel">Size</label><br>
                  <div class="form-check">
                  <input class="form-check-input" type="radio" name="size" id="small" value="small" checked>
                  @if( $menCloth[0]['small'] > 0 )
                    <label class="form-check-label" for="small"> S </label>
                    @endif
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio"  name="size" id="medium" value="medium">
                  @if( $menCloth[0]['medium'] > 0 )
                    <label class="form-check-label" for="medium"> M </label>
                    @endif
               </div>
               <div class="form-check">
                  <input class="form-check-input" type="radio"  name="size" id="large" value="large">
                  @if( $menCloth[0]['large'] > 0 )
                    <label class="form-check-label" for="large"> L </label>
                    @endif
               </div>
               <div class="form-check">
                  <input class="form-check-input" type="radio"  name="size" id="xl" value="xl">
                  @if( $menCloth[0]['xl'] > 0 )
                    <label class="form-check-label" for="xl"> XL </label>
                    @endif
               </div><br>
                  <br><label class="quantitylabe" name="quantity">Quantity</labe>
                  <input type="number" class="quantityInput" value='1' min="1" name="quantity"><br><br>
                  <input type="submit" value="Add To Card" class="btnAddToCard" >
                 
                  <!-- <a href="#" class="btnAddToCard">Add To Card </a> -->
                  </form>
             </div><!-- info-col -->
          </div><!-- row product_info -->
      </div><br><br><br><br><br><br>
   

</body>
@endsection
