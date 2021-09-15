<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Shopping_cart_visitor;
use App\Models\womanCloth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\Request as Input;
// use Input;
use Session;


class ShoppingCartController extends Controller
{
    public function ShoppingShow(){
        $shoppingcart=0;
        $shoppings = Shopping_cart_visitor::all();
        // return count($shoppings);
        if(count($shoppings) > 0 ){
            // return 'ssssssssss';
            $count = DB::table('Shopping_cart_visitor')->sum('quantity');
            Session::put('cart',$count);
            return view('ShoppingCart',compact('shoppings','shoppingcart'));
        }
        else{
           $shoppingcart=1;
        //    return $shoppingcart;
        //    return 'ddddd';
        $count = DB::table('Shopping_cart_visitor')->sum('quantity');
        Session::put('cart',$count);
            return view('ShoppingCart',compact('shoppings','shoppingcart'));
        }
    }
    public function destroy($image){
        // return $image;
        $shoppingcart=0;
        DB::delete('delete from shopping_cart_visitor where  image = ?', [$image] );
        $shoppings = Shopping_cart_visitor::all();
        // return count(Shopping_cart_visitor::all()) ;
        if(count(Shopping_cart_visitor::all()) > 0 ){
            // return 'ss';
            $count = DB::table('Shopping_cart_visitor')->sum('quantity');
            Session::put('cart',$count);
            return view('ShoppingCart',compact('shoppings','shoppingcart'));
        }
        else{
            $shoppingcart=1;
            $count = DB::table('Shopping_cart_visitor')->sum('quantity');
            Session::put('cart',$count);
            return view('ShoppingCart',compact('shoppings','shoppingcart'));
        }
      
    }
    public function EditShoppingCart(Request $req,$image,$color,$size){
        $amount=0;
        if($req->get('submit2') == '+'){
          $amount = $amount + 1;
        }
        elseif($req->get('submit1') == '-'){
            $amount = $amount - 1;
        }
        $shop = Shopping_cart_visitor::where('image','like',$image)
        ->where('color','like',$color)->where('size','like',$size)->first();
        $womenCloth=womanCloth::where('productid','like',$shop->id)->first();
        $shop->quantity = $shop->quantity +  $amount;
        $shop->price = $womenCloth->price * $shop->quantity;
        $shop->total = $womenCloth->total * $shop->quantity;
        $shop->save();
        $shoppings = Shopping_cart_visitor::all();
        $shoppingcart=0;
        if(count(Shopping_cart_visitor::all()) > 0 ){
            // return 'ss';
            $count = DB::table('Shopping_cart_visitor')->sum('quantity');
            Session::put('cart',$count);
            return view('ShoppingCart',compact('shoppings','shoppingcart'));
        }
        else{
            $shoppingcart=1;
            $count = DB::table('Shopping_cart_visitor')->sum('quantity');
            Session::put('cart',$count);
            return view('ShoppingCart',compact('shoppings','shoppingcart'));
        }
        return redirect()->back();
    }
}
