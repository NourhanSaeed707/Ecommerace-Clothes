
@extends('layout.base')
@section('navbaar')
<head>

     <!-- css files -->
    <link rel="stylesheet" type="text/css" href="{{URL('css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL('css/shoppingcart.css')}}">

     <!-- fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    </head>
   <body>
       
       @if( $shoppingcart  == 1)
       <br><br><br><br><br><br> <div class="container emptyItems" >
         <div class="emptyTitle">
             <span class="cart_empty">Your cart is empty</span>
             <br><span class="cart_emptyyy">Add some products here and make us happy !</span>
             <br><br><a href="/home">
             <span class="continueShopping">CONTINUE SHOPPING
             <i class="fas fa-forward"></i>
             </a>
          </div>
          <div class="emptyIcon">
          <i class="fal fa-cart-plus fa-10x"></i>
          </div>            
         </div><br><br><br><br><br><br>
      @else
      <!-- table-hover -->
      <br><br><br><br> <div class="container">
            <table class="table  table-striped">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Color</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
                </tr>
            </thead>
          
            @foreach($shoppings as $shop)
            <tbody>
                <tr>
                @if($shop['tablename']=='women')
                <td class="col-md-3"><img src="/images/womenClothes/clothes/{{$shop['image']}}" width="70%" height="100%"></td>
                @elseif($shop['tablename']=='men')
                <td class="col-md-3"><img src="/images/menClothes/clothes/{{$shop['image']}} " width="70%" height="100%"></td>
                @elseif($shop['tablename']=='kidsboys')
                <td class="col-md-3"><img src="/images/kidsBoy/clothes/{{$shop['image']}} "width="70%" height="100%"></td>
                @elseif($shop['tablename']=='kidsgirls')
                <td class="col-md-3"><img src="/images/kidsGirl/clothes/{{$shop['image']}}" width="70%" height="100%"></td>
                @elseif($shop['tablename']=='bags')
                <td class="col-md-3"><img src="/images/bags/clothes/{{$shop['image']}}" width="70%" height="100%"></td>
                @elseif($shop['tablename']=='shoes')
                <td class="col-md-3"><img src="/images/shoes/clothes/{{$shop['image']}}" width="70%" height="100%"></td>
                @elseif($shop['tablename']=='sunglasses')
                <td class="col-md-3"><img src="/images/sunglasses/clothes/{{$shop['image']}}" width="70%" height="100%"></td>
                @elseif($shop['tablename']=='shorts')
                <td class="col-md-3"><img src="/images/shorts/clothes/{{$shop['image']}}" width="70%" height="100%"></td>
                @elseif($shop['tablename']=='leggings')
                <td class="col-md-3"><img src="/images/leggings/clothes/{{$shop['image']}}" width="70%" height="100%"></td>
                @elseif($shop['tablename']=='tops')
                <td class="col-md-3"><img src="/images/tops/clothes/{{$shop['image']}}" width="70%" height="100%"></td>
                @endif
                <td class="col-md-2">{{$shop['name']}}</td>
                <td class="col-md-2">
                 
                <form action="/shoppingcartedi/{{$shop['image']}}/{{$shop['color']}}/{{$shop['size']}}" method="post">
                  @csrf
                <a href="/shoppingcartedi/{{$shop['image']}}/{{$shop['color']}}/{{$shop['size']}}" type="submit">

                 <div class="form-group form_items">
                     <input type="submit" name="submit1" value="-" class="btnsubmit1">
                    <!-- <input type="number" class="quantityInput" value="{{$shop['quantity']}}" min="1" name="quantity"> -->
                    <input type="text" class="quantityInput" value="{{$shop['quantity']}}" name="quantity">
                    <input name="submit2" type="submit" value="+" class="btnsubmit2" />
                 </div>
                </a>
             </form>
            
           
                </td>
                @if($shop['tablename']=='women')
                <td class="col-md-2"><img src="/images/womenClothes/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @elseif($shop['tablename']=='men')
                <td class="col-md-2"><img src="/images/menClothes/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @elseif($shop['tablename']=='kidsboys')
                <td class="col-md-2"><img src="/images/kidsBoy/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @elseif($shop['tablename']=='kidsgirls')
                <td class="col-md-2"><img src="/images/kidsGirl/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @elseif($shop['tablename']=='bags')
                <td class="col-md-2"><img src="/images/bags/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @elseif($shop['tablename']=='shoes')
                <td class="col-md-2"><img src="/images/shoes/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @elseif($shop['tablename']=='sunglasses')
                <td class="col-md-2"><img src="/images/sunglasses/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @elseif($shop['tablename']=='shorts')
                <td class="col-md-2"><img src="/images/shorts/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @elseif($shop['tablename']=='leggings')
                <td class="col-md-2"><img src="/images/leggings/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @elseif($shop['tablename']=='tops')
                <td class="col-md-2"><img src="/images/tops/color/{{$shop['color']}}" class="colorWithBorder" width="42px" height="42px" alt="color" alt="color"></td>
                @endif
                <td class="col-md-2">{{$shop['size']}}</td>
                <td class="col-md-2">{{$shop['total']}}</td>
                <td class="col-md-2"><a href="/shoppingcartdest/{{$shop['image']}}"><i class="fas fa-times fa-2x"></i></a></td>
                </tr>
            </tbody>
            @endforeach
            </table>
            <?php
                    $subtotal = DB::table('Shopping_cart_visitor')->sum('total');
            ?>
            <!-- <form action="" > -->
           <br><br><br><div class="checkoutSection">
                <div class="subTotalOfPrice">
                    <span class="subTotal">SUBTOTAL</span>
                    <span class="totaal">{{$subtotal}}$</span>
                </div>  <!-- subtotalprice -->
                <br><a href="/shoppingcartvie" class="abtn"> <input type="submit" value="CHECK OUT" name="btnCheckOut" class="CheckOutbtn"></a>
           </div> <!-- checkout section -->
</div><br><br><br><br>
@endif

</body>
@endsection