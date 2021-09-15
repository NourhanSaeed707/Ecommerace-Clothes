@extends('layout.base')
@section('navbaar')
   <head>
     <!--fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <!-- css files -->
     <link rel="stylesheet" type="text/css" href="{{URL('css/base.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL('css/womanindex.css')}}">
    </head>
   <body>
    
  <br><br><br><div class="container womanSection">
     <div class="row align-items-center  justify-content-between">
          @foreach($menClothes as $cloth)
           <div class="col-md-3">
               <div class="item img">
                <?php
                $pieces = explode(',',$cloth['image']);
                ?>
               
               <br><br><a href="/manclotheshow/{{$cloth['productid']}}">
                 <img src="/images/menClothes/clothes/{{$pieces[0]}}" alt="cloth" width="100%">
                </a>
               </div>
               <div class="item clothname">{{$cloth['name']}}</div>
               <div class="pricetotal">
               @if( $cloth['price']  != $cloth['total'] )
               <strike class="item clothprice"style="color:red">{{$cloth['price']}}$</strike>
               <div class="item clothtotal ">{{$cloth['total']}}$</div>
               @else
               <div class="item clothprice">{{$cloth['price']}}$</div>
               @endif
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
   </div><br>

   <br><br><br><br><span class="paginatee">
     {{$menClothes->links()}}
   </span><br>
   <style>
     .w-5{display:none;}
   </style>

</body>
@endsection
