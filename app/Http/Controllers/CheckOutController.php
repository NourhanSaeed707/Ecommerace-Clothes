<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KidBoy;
use App\Models\KidGirl;
use App\Models\legging;
use App\Models\Shoes;
use App\Models\shorts;
use App\Models\Sunglasses;
use App\Models\top;
use App\Models\Bag;
use App\Models\womanCloth;
use App\Models\menCloth;
use App\Models\checkout;
use App\Models\Shopping_cart_visitor;
use Session;

class CheckOutController extends Controller
{
    //
    public function bladeview(){
        return view('checkout');
    }
    public function index(Request $req){
        $request->validate([
            'firstname' =>'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|numeric',
            'nameoncode' => 'required|string',
            'cardnumber' => 'required|numeric',
            'datee' => 'required',
            'postalcode' => 'required',
            'securitycode' => 'required|numeric',
    ]);
    $check = new checkout([
        'firsrname' => $request->get('firstname'),
        'lastname' => $request->get('lastname'),
        'phone' => $request->get('phone'),
        'nameoncard' => $request->get('nameoncard'),
        'cardnumber' => $request->get('cardnumber'),
        'datee' => $request->get('datee'),
        'postalcode' => $request->get('postalcode'),
        'securitycode' => $request->get('securitycode'),
     ]);
     $check->save();
    //  $shoppings = Shopping_cart_visitor::all();
    //  foreach($shoppings as $shop){
    //      if($shop['tablename'] == 'women'){
    //         $womenCloth=womanCloth::where('productid','like',$shop['id'])->first();
    //         if($shop['size'] == 'small' && count($womenCloth->small) > 0 ){
    //           $womenCloth->small = $womenCloth->small - $shop['quantity'] ;
    //         }
    //         elseif($shop['size'] == 'medium' && count($womenCloth->medium) > 0){
    //             $womenCloth->medium = $womenCloth->medium - $shop['quantity'] ;
    //         }
    //         elseif($shop['size'] == 'large' && count($womenCloth->large) > 0){
    //             $womenCloth->large = $womenCloth->large - $shop['quantity'] ;
    //         }
    //         elseif($shop['size'] == 'xl' && count($womenCloth->xl) > 0){
    //             $womenCloth->xl = $womenCloth->xl - $shop['quantity'] ;
    //         }
    //     }
    //      elseif($shop['tablename'] == 'men'){
    //         $menCloth=menCloth::where('productid','like',$shop['id'])->first();
    //         if($shop['size'] == 'small' && count($womenCloth->small) > 0 ){
    //             $menCloth->small = $menCloth->small - $shop['quantity'] ;
    //           }
    //           elseif($shop['size'] == 'medium' && count($menCloth->medium) > 0){
    //               $menCloth->medium = $menCloth->medium - $shop['quantity'] ;
    //           }
    //           elseif($shop['size'] == 'large' && count($menCloth->large) > 0){
    //               $menCloth->large = $menCloth->large - $shop['quantity'] ;
    //           }
    //           elseif($shop['size'] == 'xl' && count($menCloth->xl) > 0){
    //               $menCloth->xl = $menCloth->xl - $shop['quantity'] ;
    //           }

    //      }
    //      elseif($shop['tablename'] == 'kidboy'){
    //         $kidBoyCloth=KidBoy::where('productid','like',$shop['id'])->first();
    //      }
    //      elseif($shop['tablename'] == 'kidgirl'){
    //         $kidGirlCloth=KidGirl::where('productid','like',$shop['id'])->first();

    //     }
    //     elseif($shop['tablename'] == 'top'){
    //         $tops=top::where('productid','like',$shop['id'])->first();

    //     }
    //     elseif($shop['tablename'] == 'shorts'){
    //         $shorts=shorts::where('productid','like',$shop['id'])->first();

    //     }
    //     elseif($shop['tablename'] == 'leggings'){
    //         $leggings=legging::where('productid','like',$leggings['id'])->first();

    //     }
    //     elseif($shop['tablename'] == 'bags'){
    //         $bags=Bag::where('productid','like',$shop['id'])->first();

    //     }
    //     elseif($shop['tablename'] == 'shoes'){
    //         $shoes=shoes::where('productid','like',$shop['id'])->first();

    //     }
    //     elseif($shop['tablename'] == 'sunglasses'){
    //         $sunglasses=Sunglasses::where('productid','like',$shop['id'])->first();

    //     }
    //  }

    // }
    }
}
