<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{URL('css/base.css')}}">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT&family=Stint+Ultra+Condensed&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>MoonChi</title>
  </head>
  <body>

      <div class="head-Header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="images/Home/logo.jpg" alt="logoImage" width="60" height="44">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Clothes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('womenClothes.create')}}">Create New Woman Product</a></li>
                      <li><a class="dropdown-item" href="{{route('womanClothes.search')}}">Edit Woman Product</a></li>
                      <li><a class="dropdown-item" href="{{route('WomenClothes.Delete')}}">Delete Woman Product</a></li>
                      <li><a class="dropdown-item" href="{{route('menClothes.create')}}">Create New Men Product</a></li>
                      <li><a class="dropdown-item" href="{{route('menClothes.search')}}">Edit Men Product</a></li>
                      <li><a class="dropdown-item" href="{{route('MenClothes.Delete')}}">Delete Men Product</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Fitness
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('leggings.create')}}">create New Leggings Product</a></li>
                      <li><a class="dropdown-item" href="{{route('leggings.search')}}">Edit Leggings Product</a></li>
                      <li><a class="dropdown-item" href="{{route('leggings.Deletee')}}">Delete Leggings Product</a></li>
                      <li><a class="dropdown-item" href="{{route('tops.create')}}">create New Top Product</a></li>
                      <li><a class="dropdown-item" href="{{route('tops.search')}}">Edit Top Product</a></li>
                      <li><a class="dropdown-item" href="{{route('tops.Deletee')}}">Delete Top Product</a></li>
                      <li><a class="dropdown-item" href="{{route('shorts.create')}}">create New Shorts Product</a></li>
                      <li><a class="dropdown-item" href="{{route('shorts.search')}}">Edit Shorts Product</a></li>
                      <li><a class="dropdown-item" href="{{route('shorts.Deletee')}}">Delete Shorts Product</a></li>

                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Kids
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('Kidgirl.create')}}">Create New Kid Girl Product</a></li>
                      <li><a class="dropdown-item" href="{{route('Kidgirl.search')}}">Edit Kid Girl Product</a></li>
                      <li><a class="dropdown-item" href="{{route('Kidgirl.Deletee')}}">Delte Kid Girl Product</a></li>
                      <li><a class="dropdown-item" href="{{route('KidBoys.create')}}">Create New Kid Boy Product</a></li>
                      <li><a class="dropdown-item" href="{{route('KidBoys.search')}}">Edit Kid Boy Product</a></li>
                      <li><a class="dropdown-item" href="{{route('KidBoys.Deletee')}}">Delete Kid Boy Product</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Accessories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('Bags.create')}}">Create New Bags Products</a></li>
                      <li><a class="dropdown-item" href="{{route('Bags.search')}}">Edit Bags Products</a></li>
                      <li><a class="dropdown-item" href="{{route('Bags.Deletee')}}">Delete Bags Products</a></li>
                      <li><a class="dropdown-item" href="{{route('shoes.create')}}">Create New Shoes Products</a></li>
                      <li><a class="dropdown-item" href="{{route('shoess.search')}}">Edit Shoes Products</a></li>
                      <li><a class="dropdown-item" href="{{route('shoess.Deletee')}}">Delete Bags Products</a></li>
                      <li><a class="dropdown-item" href="{{route('sunglasses.create')}}">Create New Sunglasses Products</a></li>
                      <li><a class="dropdown-item" href="{{route('sunglassess.search')}}">Edit Sunglasses Products</a></li>
                      <li><a class="dropdown-item" href="{{route('sunglassess.Delete')}}">Delete Sunglasses Products</a></li>
                    </ul>
                  </li>

                </ul>
                {{-- <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit" class="searchBtn">Search</button>
                </form> --}}
              </div>
            </div>
          </nav>
      </div>
      <div class=" contenntt"> @yield('navbaar')</div>



     <!-- footer -->
     <footer class="footerEnd">
         <div class="FooterItems">
            <div class="Services">
                <span class="FooterTitle">Services</span>
                <p class="footerItem">FAQ</p>
                <p class="footerItem">Shipping & Returns</p>
                <p class="footerItem">Contact Us</p>
                <p class="footerItem">Fit Guide</p>
            </div>
            <div class="Company">
                <span class="FooterTitle">Company</span>
                <p class="footerItem">About Us</p>

            </div>
            <div class="Stores">
                <span class="FooterTitle">Stores</span>
                <p class="footerItem">City Center</p>
                <p class="footerItem">Fashion Place</p>
            </div>
            <div class="footerIcons">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
            </div>
         </div>

     </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
