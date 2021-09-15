<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WomanClothes;
use App\Http\Controllers\menClothes;
use App\Http\Controllers\leggingController;
use App\Http\Controllers\topController;
use App\Http\Controllers\shortController;
use App\Http\Controllers\KidsGirl;
use App\Http\Controllers\KidsBoy;
use App\Http\Controllers\BagsController;
use App\Http\Controllers\ShoesController;
use App\Http\Controllers\SunglassesController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Middleware\EnsureUserHasRole;
use App\Models\Shopping_cart_visitor;
use App\Mail\forgetPasswordMail;
use App\Http\Controllers\Auth\CustomerAuth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//routes
Route::get('/',function(){
    return view('layouts.base');
 });
 Route::get('/home',function(){
     return view('Home');
 });

//Admin Controll
// Route::middleware([EnsureUserHasRole::class])->group(function(){

Route::post('/womenstore',[WomanClothes::class,'store'])->name('womenClothes.store');
Route::post('/menstore',[menClothes::class,'store'])->name('menClothes.store');
Route::post('/leggingstore',[leggingController::class,'store'])->name('leggings.store');
Route::post('/topstore',[topController::class,'store'])->name('tops.store');
Route::post('/shortstore',[shortController::class,'store'])->name('shorts.store');
Route::post('KidGirlstore',[KidsGirl::class,'store'])->name('Kidgirl.store');
Route::post('/KidBoystore',[kidsBoy::class,'store'])->name('KidBoys.store');
Route::post('/Bagstore',[BagsController::class,'store'])->name('Bags.store');
Route::post('/shoesstore',[ShoesController::class,'store'])->name('shoes.store');
Route::post('/sunglassesstore',[SunglassesController::class,'store'])->name('sunglasses.store');
// women show
Route::get('/womenclothesview',[WomanClothes::class,'index'])->name('womenClothes.index');
Route::get('/womanclotheshow/{id}',[WomanClothes::class,'show'])->name('womenClothes.show');
Route::get('/womanclotheshowc/{color}/{id}',[WomanClothes::class,'showColor'])->name('womenClothes.showColor');
Route::post('/womanclotheaddToCard/{id}/{image}/{color}',[WomanClothes::class,'AddToCard'])->name('womenClothes.addToCard');
// Home controller
Route::get('/searchshow',[HomeController::class,'generalSearch'])->name('generalSearch.show');
Route::get('/searchshowcolor/{color}/{id}',[HomeController::class,'showColor'])->name('generalSearch.showColor');
Route::post('/searchaddtocart/{id}/{image}/{color}',[HomeController::class,'AddToCard'])->name('generalSearch.addToCard');

// shopping cart
Route::get('/shoppingcartshow',[ShoppingCartController::class,'ShoppingShow'])->name('ShoppingCart.ShoppingShow');
Route::get('/shoppingcartdest/{image}',[ShoppingCartController::class,'destroy'])->name('ShoppingCart.destroy');
Route::post('/shoppingcartedi/{image}/{color}/{size}',[ShoppingCartController::class,'EditShoppingCart'])->name('ShoppingCart.editShoppingCart');
Route::get('/shoppingcartvie',[CheckOutController::class,'bladeview'])->name('checkout.bladeview');
Route::post('/shoppingcartchec',[CheckOutController::class,'index'])->name('checkout.index');

// men controller
Route::get('/menclothesview',[menClothes::class,'index'])->name('menClothes.index');
Route::get('/manclotheshow/{id}',[menClothes::class,'show'])->name('menClothes.show');
Route::get('/manclotheshowc/{color}/{id}',[menClothes::class,'showColor'])->name('menClothes.showColor');
Route::post('/manclotheaddToCard/{id}/{image}/{color}',[menClothes::class,'AddToCard'])->name('menClothes.addToCard');

// kidboy controller
Route::get('/kidsboyclothesview',[kidsBoy::class,'index'])->name('kidsboyClothes.index');
Route::get('/kidboyclotheshow/{id}',[kidsBoy::class,'show'])->name('kidsboyClothes.show');
Route::get('/kidboyclotheshowc/{color}/{id}',[kidsBoy::class,'showColor'])->name('kidsboyClothes.showColor');
Route::post('/kidboyclotheaddToCard/{id}/{image}/{color}',[kidsBoy::class,'AddToCard'])->name('kidsboyClothes.addToCard');

// kidgirl controller
Route::get('/kidsgirlclothesview',[kidsGirl::class,'index'])->name('kidsgirlClothes.index');
Route::get('/kidgirlclotheshow/{id}',[kidsGirl::class,'show'])->name('kidsgirlClothes.show');
Route::get('/kidgirlclotheshowc/{color}/{id}',[kidsGirl::class,'showColor'])->name('kidsgirlClothes.showColor');
Route::post('/kidgirlclotheaddToCard/{id}/{image}/{color}',[kidsGirl::class,'AddToCard'])->name('kidsgirlClothes.addToCard');

// shoes controller
Route::get('/shoesclothesview',[ShoesController::class,'index'])->name('shoesClothes.index');
Route::get('/shoesclotheshow/{id}',[ShoesController::class,'show'])->name('shoesClothes.show');
Route::get('/shoesclotheshowc/{color}/{id}',[ShoesController::class,'showColor'])->name('shoesClothes.showColor');
Route::post('/shoesclotheaddToCard/{id}/{image}/{color}',[ShoesController::class,'AddToCard'])->name('shoesClothes.addToCard');

// shorts controller
Route::get('/shortsclothesview',[shortController::class,'index'])->name('shortsClothes.index');
Route::get('/shortsclotheshow/{id}',[shortController::class,'show'])->name('shortsClothes.show');
Route::get('/shortsclotheshowc/{color}/{id}',[shortController::class,'showColor'])->name('shortsClothes.showColor');
Route::post('/shortsclotheaddToCard/{id}/{image}/{color}',[shortController::class,'AddToCard'])->name('shortsClothes.addToCard');

// sunglasses controller
Route::get('/sunglassesclothesview',[SunglassesController::class,'index'])->name('sunglassesClothes.index');
Route::get('/sunglassesclotheshow/{id}',[SunglassesController::class,'show'])->name('sunglassesClothes.show');
Route::get('/sunglassesclotheshowc/{color}/{id}',[SunglassesController::class,'showColor'])->name('sunglassesClothes.showColor');
Route::post('/sunglassesclotheaddToCard/{id}/{image}/{color}',[SunglassesController::class,'AddToCard'])->name('sunglassesClothes.addToCard');

// bags controller
Route::get('/bagsclothesview',[BagsController::class,'index'])->name('bagsClothes.index');
Route::get('/bagsclotheshow/{id}',[BagsController::class,'show'])->name('bagsClothes.show');
Route::get('/bagsclotheshowc/{color}/{id}',[BagsController::class,'showColor'])->name('bagsClothes.showColor');
Route::post('/bagsclotheaddToCard/{id}/{image}/{color}',[BagsController::class,'AddToCard'])->name('bagsClothes.addToCard');

// tops controller
Route::get('/topsclothesview',[topController::class,'index'])->name('topsClothes.index');
Route::get('/topsclotheshow/{id}',[topController::class,'show'])->name('topsClothes.show');
Route::get('/topsclotheshowc/{color}/{id}',[topController::class,'showColor'])->name('topsClothes.showColor');
Route::post('/topsclotheaddToCard/{id}/{image}/{color}',[topController::class,'AddToCard'])->name('topsClothes.addToCard');

// leggings controller
Route::get('/leggingsclothesview',[leggingController::class,'index'])->name('leggingsClothes.index');
Route::get('/leggingsclotheshow/{id}',[leggingController::class,'show'])->name('leggingsClothes.show');
Route::get('/leggingsclotheshowc/{color}/{id}',[leggingController::class,'showColor'])->name('leggingsClothes.showColor');
Route::post('/leggingsclotheaddToCard/{id}/{image}/{color}',[leggingController::class,'AddToCard'])->name('leggingsClothes.addToCard');

Route::get('/bestseller',[HomeController::class,'bestsellerShow'])->name('bestseller.show');


Route::group(['middleware' => 'WomanMiddleware' ],function(){
 //Women Clothes Routes
Route::resource('/women','App\Http\Controllers\WomanClothes');
Route::get('/womencreate',[WomanClothes::class,'create'])->name('womenClothes.create');
Route::get('/womensearch',function(){
    return view('WomanClothes.search');
})->name('womanClothes.search');
Route::get('/womenedit',[WomanClothes::class,'edit'])->name('womenClothes.edit');
Route::get('/womenupdate',[WomanClothes::class,'update'])->name('womenClothes.update');
Route::get('/womendeletee',function(){
   return view('WomanClothes.delete');
})->name('WomenClothes.Delete');
Route::get('/womendelete',[WomanClothes::class,'destroy'])->name('womenClothes.delete');


//Men Clothes Routes
Route::resource('/men','App\Http\Controllers\menClothes');
Route::get('/mencreate',[menClothes::class,'create'])->name('menClothes.create');
Route::get('/mensearch',function(){
    return view('menClothes.search');
})->name('menClothes.search');
Route::get('/menedit',[menClothes::class,'edit'])->name('menClothes.edit');
Route::get('/menupdate',[menClothes::class,'update'])->name('menClothes.update');
Route::get('/mendeletee',function(){
    return view('MenClothes.delete');
})->name('MenClothes.Delete');
Route::get('/mendelete',[menClothes::class,'destroy'])->name('menClothes.delete');
;
//  Route::get('/mendelete',[menClothes::class,'destroy'])->name('menClothes.delete');

 //Legging Clothes Routes
Route::resource('/fitnessLegging','App\Http\Controllers\leggingController');
Route::get('/leggingcreate',[leggingController::class,'create'])->name('leggings.create');
Route::get('/leggingsearch',function(){
    return view('Leggings.search');
})->name('leggings.search');
Route::get('/leggingedit',[leggingController::class,'edit'])->name('leggings.edit');
Route::get('/leggingupdate',[leggingController::class,'update'])->name('leggings.update');
// Route::delete('/leggingdelete',[leggingController::class,'destroy'])->name('leggings.delete');
Route::get('/leggingdeletee',function(){
     return view('Leggings.delete');
 })->name('leggings.Deletee');
 Route::get('/leggingdelete',[leggingController::class,'destroy'])->name('leggings.delete');

 //Top Clothes Routes
Route::resource('/fitnessTop','App\Http\Controllers\topController');
Route::get('/topcreate',[topController::class,'create'])->name('tops.create');
Route::get('/topsearch',function(){
    return view('Tops.search');
})->name('tops.search');
Route::get('/topedit',[topController::class,'edit'])->name('tops.edit');
Route::get('/topupdate',[topController::class,'update'])->name('tops.update');
// Route::delete('/topdelete',[topController::class,'destroy'])->name('tops.delete');
Route::get('/topdeletee',function(){
     return view('Tops.delete');
 })->name('tops.Deletee');
 Route::get('/topdelete',[leggingController::class,'destroy'])->name('tops.delete');

//Shorts Clothes Routes
Route::resource('/fitnessShort','App\Http\Controllers\shortController');
Route::get('/shortcreate',[shortController::class,'create'])->name('shorts.create');
Route::get('/shortsearch',function(){
    return view('Shorts.search');
})->name('shorts.search');
Route::get('/shortedit',[shortController::class,'edit'])->name('shorts.edit');
Route::get('/shortupdate',[shortController::class,'update'])->name('shorts.update');
// Route::delete('/shortdelete',[shortController::class,'destroy'])->name('shorts.delete');
Route::get('/shortdeletee',function(){
     return view('Shorts.delete');
 })->name('shorts.Deletee');
 Route::get('/shortdelete',[shortControllerr::class,'destroy'])->name('shorts.delete');

// Kids Girl Clothes Routes
Route::resource('/KidsGirl','App\Http\Controllers\KidsGirl');
Route::get('/KidGirlcreate',[KidsGirl::class,'create'])->name('Kidgirl.create');
Route::get('/KidGirlsearch',function(){
    return view('kidsGirl.search');
})->name('Kidgirl.search');
Route::get('/KidGirledit',[KidsGirl::class,'edit'])->name('Kidgirl.edit');
Route::get('/KidGirlupdate',[KidsGirl::class,'update'])->name('Kidgirl.update');
// Route::delete('/KidGirldelete',[KidsGirl::class,'destroy'])->name('Kidgirl.delete');
Route::get('/KidGirldeletee',function(){
     return view('KidsGirl.delete');
 })->name('Kidgirl.Deletee');
 Route::get('/KidGirldelete',[KidsGirlr::class,'destroy'])->name('Kidgirl.delete');

// Kids Boy clothes Routes
Route::resource('/KidBoy','App\Http\Controllers\kidsBoy');
Route::get('/KidBoycreate',[kidsBoy::class,'create'])->name('KidBoys.create');
Route::get('/KidBoysearch',function(){
    return view('KidsBoys.search');
})->name('KidBoys.search');
Route::get('/KidBoyedit',[kidsBoy::class,'edit'])->name('KidBoys.edit');
Route::get('/KidBoyupdate',[kidsBoy::class,'update'])->name('KidBoys.update');
// Route::delete('/KidBoydelete',[kidsBoy::class,'destroy'])->name('KidBoys.delete');
Route::get('/KidBoydeletee',function(){
     return view('KidsBoys.delete');
 })->name('KidBoys.Deletee');
 Route::get('/KidBoydelete',[kidsBoy::class,'destroy'])->name('KidBoys.delete');

// Bags Accessories Routes
 Route::resource('/Bags','App\Http\Controllers\BagsController');
 Route::get('/Bagcreate',[BagsController::class,'create'])->name('Bags.create');
 Route::get('/Bagsearch',function(){
     return view('Bags.search');
 })->name('Bags.search');
 Route::get('/Bagedit',[BagsController::class,'edit'])->name('Bags.edit');
 Route::get('/Bagupdate',[BagsController::class,'update'])->name('Bags.update');
//  Route::delete('/Bagdelete',[BagsController::class,'destroy'])->name('Bags.delete');
 Route::get('/Bagdeletee',function(){
      return view('Bags.delete');
  })->name('Bags.Deletee');
  Route::get('/Bagdelete',[BagsController::class,'destroy'])->name('Bags.delete');


// Shoes Accessories Routes
Route::resource('/Shoes','App\Http\Controllers\ShoesController');
Route::get('/shoescreate',[ShoesController::class,'create'])->name('shoes.create');
Route::get('/shoessearch',function(){
    return view('Shoes.search');
})->name('shoess.search');
Route::get('/shoesedit',[ShoesController::class,'edit'])->name('shoes.edit');
Route::get('/shoesupdate',[ShoesController::class,'update'])->name('shoes.update');
// Route::delete('/shoesdelete',[ShoesController::class,'destroy'])->name('shoes.delete');
Route::get('/shoesdeletee',function(){
     return view('Shoes.delete');
 })->name('shoess.Deletee');
 Route::get('/shoesdelete',[ShoesController::class,'destroy'])->name('shoes.delete');

// Sunglasses Accessories Routes
Route::resource('/Sunglasses','App\Http\Controllers\SunglassesController');
Route::get('/sunglassescreate',[SunglassesController::class,'create'])->name('sunglasses.create');
Route::get('/sunglassessearch',function(){
    return view('Sunglasses.search');
})->name('sunglassess.search');
Route::get('/sunglassesedit',[SunglassesController::class,'edit'])->name('sunglasses.edit');
Route::get('/sunglassesupdate',[SunglassesController::class,'update'])->name('sunglasses.update');
Route::delete('/sunglassesdelete',[SunglassesController::class,'destroy'])->name('sunglasses.delete');
Route::get('/sunglassesdeletee',function(){
     return view('Sunglasses.delete');
 })->name('sunglassess.Delete');
 Route::get('/sunglassesdelete',[SunglassesController::class,'destroy'])->name('sunglasses.delete');

});

//Admin Home Route
Route::get('/admin',function(){
    return view('homeAdmin');
});
Route::get('/admincreate',[adminController::Class,'create'])->name('admin.create');
Route::post('/adminstore',[adminController::Class,'store'])->name('admin.store');
Route::get('/adminhomee',function(){
    return view ('Admin.main');
});
Route::get('/adminLogin',function(){
    return view('Admin.AdminLogin');
})->name('admin.AdminPage');

Route::get('/adminncheck/{path}',[adminController::class,'checkAuth'])->name('admin.checkAuth');

Route::get('/admincheck/{path}',[adminController::class,'check'])->name('admin.AdminCheck');
Route::get('/middl',[adminController::class,'callMiddleware'])->name('middlewareCheck');

// header show
Route::get('/WomenClothes',[WomanClothes::class,'index'])->name('womenClothes.index');


Route::get('/checkAuth/{path}',[WomanClothes::class,'checkAuth'])->name('womenClothes.checkAuth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';