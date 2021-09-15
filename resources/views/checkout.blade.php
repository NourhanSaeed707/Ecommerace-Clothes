@extends('layout.base')
@section('navbaar')
<head>

     <!-- css files -->
    <link rel="stylesheet" type="text/css" href="{{URL('css/base.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{URL('css/shoppingcart.css')}}"> -->

     <!-- fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    </head>
     <br><br><br><form class="" action="/shoppingcartchec" method="post">
         @csrf
         <select name="countries" id="country">
            <option value="Egypt">Egypt</option>
            <option value="Australia">Australia</option>
            <option value="Cuba">Cuba</option>
            <option value="South Africa">South Africa</option>
            <option value="	Spain">	Spain</option>
          </select>
          <div class="mb-3">
            <!-- <label for="name" class="form-label">Name on card</label> -->
            <input type="text" class="form-control" name ="firstname"id="firstname" aria-describedby="emailHelp" placeholder="First Name">
          </div>
          <div class="mb-3">
            <!-- <label for="name" class="form-label">Name on card</label> -->
            <input type="text" class="form-control" name ="lastname"id="lastname" aria-describedby="emailHelp" placeholder="Last Name">
          </div>
          <div class="mb-3">
            <!-- <label for="name" class="form-label">Name on card</label> -->
            <input type="text" class="form-control" name ="phone"id="phone" aria-describedby="emailHelp" placeholder="Mobile Phone">
          </div>
         <div class="mb-3">
            <!-- <label for="name" class="form-label">Name on card</label> -->
            <input type="text" class="form-control" name ="nameoncode"id="namecode" aria-describedby="emailHelp" placeholder="Name on Card">
          </div>
          <div class="mb-3">
            <!-- <label for="cardnumber" class="form-label">Card Number</label> -->
            <input type="number" class="form-control" name="cardnumber" id="cardnumber" aria-describedby="emailHelp" placeholder="Card Number">
          </div>
          <div class="mb-3">
            <!-- <label for="monthyear" class="form-label">Card Number</label> -->
            <input type="month" class="form-control" name="datee" id="monthyear" aria-describedby="emailHelp" placeholder="MM/YY">
          </div>
          <div class="mb-3">
            <!-- <label for="zipcode" class="form-label">Zip/Postal Code</label> -->
            <input type="text" class="form-control" name="postalcode" id="zipcode" aria-describedby="emailHelp" placeholder="Zip/Postal Code">
          </div>
          <div class="mb-3">
            <!-- <label for="zipcode" class="form-label">Security Code</label> -->
            <input type="number" class="form-control" name="securitycode" id="SecurityCode" aria-describedby="emailHelp" placeholder="Security Code">
          </div>
          <input type="submit" name="btnsubmit" value="submit">
     </form><br><br><br>
   <body>



   </body>
@endsection