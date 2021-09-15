<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{URL('css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL('css/Home.css')}}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>MoonChi</title>
  </head>
  <body>

     <!-- Navbar part -->
     <div class="navbar1">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      UK
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Arabic</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-alt"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="/login">Login</a></li>
                      <li><a class="dropdown-item" href="/register">Register</a></li>
                    </ul>
                  </li>
                  <a class="nav-link" href="/shoppingcartshow"><i class="fas fa-shopping-cart ShoppingCartParent"></i></a>
                  @if( Session::get('cart') > 0)
                  <span class="shoppingCartCount">{{Session::get('cart')}}</span>
                  @endif
                </ul>
              </div>
            </div>
          </nav>
      </div>
     
      <div class="head-Header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/images/Home/logo.jpg" alt="logoImage" width="60" height="44">
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
                      <li><a class="dropdown-item" href="/womenclothesview">Woman</a></li>
                      <li><a class="dropdown-item" href="/menclothesview">Men</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Fitness
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/leggingsclothesview">LEGGINGS</a></li>
                      <li><a class="dropdown-item" href="/topsclothesview">TOPS</a></li>
                      <li><a class="dropdown-item" href="/shortsclothesview">SHORTS</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Kids
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/kidsgirlclothesview">Girls</a></li>
                      <li><a class="dropdown-item" href="/kidsboyclothesview">Boys</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Accessories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/bagsclothesview">BAGS</a></li>
                      <li><a class="dropdown-item" href="/shoesclothesview">SHOES</a></li>
                      <li><a class="dropdown-item" href="/sunglassesclothesview">SUNGLASSES</a></li>
                    </ul>
                  </li>

                </ul>
                <form class="d-flex" action="/searchshow" methond="gets">
                  <input name="searchtxt" class="form-control me-2" type="search" placeholder="Search"  aria-label="Search">
                  <button class="btn btn-outline-success" type="submit" class="searchBtn">Search</button>
                </form>
              </div>
            </div>
          </nav>
      </div>

      <!-- background-Image -->
      <div class="backgroundHome">
          <img src="images/Home/back4.jpg" alt="BackgroundHomeImg">
              <span class="navbar-text">
                snag one of our new styles before they're gone.
              </span>
              <a href="/womenclothesview"><input type="button" name="shopNow" value="Shop Now" ></a>
        </div>
        <div class="videoFashion">
            {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/uWpYsE9ovoo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
            <video src="/images/fashionVideo.mp4" autoplay controls width="85%">
        </div>
        
        <?php 
        // use App\Models\womanCloth;

            $best = DB::table('women_clothes')->orderBy('bestseller', 'desc')->take(4)->get();
           
            
          
            $c=0;
        ?>
      <!-- bestseller-->
        <br><div class="bestseller-clothes mrg">
            <p class="bestsellerTitle">Best sellers</p><hr>
            <div class="bestsellerItems mrg">
                <?php
                      $pieces1 = explode(',',$best[0]->image );
                      $pieces2 = explode(',',$best[1]->image );
                      $pieces3 = explode(',',$best[2]->image );
                      $pieces4 = explode(',',$best[3]->image );
              
                ?>
              <div class="bestsellerItem col-md-2">
                <a href="/womanclotheshow/{{$best[0]->productid}}"><img src="images/womenClothes/clothes/{{$pieces1[0]}}" width="100%" height="100%"></a>
              </div>
              <div class="bestsellerItem col-md-2">
              <a href="/womanclotheshow/{{$best[1]->productid}}"><img src="images/womenClothes/clothes/{{$pieces2[0]}}" width="100%" height="100%"></a>
              </div>
              <div class="bestsellerItem col-md-2">
              <a href="/womanclotheshow/{{$best[2]->productid}}"><img src="images/womenClothes/clothes/{{$pieces3[0]}}" width="100%" height="100%"></a>
              </div>
              <div class="bestsellerItem col-md-2">
              <a href="/womanclotheshow/{{$best[3]->productid}}"><img src="images/womenClothes/clothes/{{$pieces4[0]}}" width="100%" height="100%"></a>
              </div>
            </div>
        </div>


     <!-- footer -->
     <br><hr><br><br><br><br><footer class="footerEnd mrg">
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
