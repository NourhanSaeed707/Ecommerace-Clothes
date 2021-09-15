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
use App\Models\Shopping_cart_visitor;
use Session;

class HomeController extends Controller
{
    public function generalSearch(Request $request){
        $clothName = $request->get('searchtxt');
        // return $clothName;
        $womenCloth=womanCloth::where('name','like',$clothName)->get();
        $menCloth=menCloth::where('name','like',$clothName)->get();
        $kidBoyCloth=KidBoy::where('name','like',$clothName)->get();
        $kidGirlCloth=KidGirl::where('name','like',$clothName)->get();
        $tops=top::where('name','like',$clothName)->get();
        $bags=Bag::where('name','like',$clothName)->get();
        $shoes=shoes::where('name','like',$clothName)->get();
        $sunglasses=Sunglasses::where('name','like',$clothName)->get();
        $shorts=shorts::where('name','like',$clothName)->get();
        $leggings=legging::where('name','like',$clothName)->get();
        $generalCloth;
        $filename;
        // return empty($womenCloth);
        // return 'slll';
        if(count($womenCloth) != 0){
            // return 'womennn';
            $generalCloth=$womenCloth;
            $filename='womenClothes';
        }
        elseif(count($menCloth) !=0 ){
            // return 'men';
            $generalCloth=$menCloth;
            $filename='menClothes';
        }
        elseif(count($kidBoyCloth) != 0 ){
            $generalCloth=$KidBoyCloth;
            $filename='kidsBoy';
        }
        elseif(count($kidGirlCloth) != 0){
            $generalCloth=$KidGirlnCloth;
            $filename='kidsGirl';
        }
        elseif( count($tops) != 0 ){
            $generalCloth=$tops;
            $filename='tops';
        }
        elseif(count($bags) != 0 ){
            $generalCloth=$bags;
            $filename='bags';
        }
        elseif( count($shoes) !=0 ){
            $generalCloth=$shoes;
            $filename='shoes';
        }
        elseif(count($sunglasses) != 0){
            $generalCloth=$sunglasses;
            $filename='sunglasses';
        }
        elseif(count($shorts) != 0){
            $generalCloth=$shorts;
            $filename='shorts';
        }
        elseif( count($leggings) !=0){
            $generalCloth=$leggings;
            $filename='leggings';
        }
        return view('generalSearch',compact('generalCloth','filename'));
    }
    public function showColor($color,$id){
        $womenCloth=womanCloth::where('productid','like',$id)->get();
        $menCloth=menCloth::where('productid','like',$clothName)->get();
        $kidBoyCloth=KidBoy::where('productid','like',$clothName)->get();
        $kidGirlCloth=KidGirl::where('productid','like',$clothName)->get();
        $tops=top::where('productid','like',$clothName)->get();
        $bags=Bag::where('productid','like',$clothName)->get();
        $shoes=shoes::where('productid','like',$clothName)->get();
        $sunglasses=Sunglasses::where('productid','like',$clothName)->get();
        $shorts=shorts::where('productid','like',$clothName)->get();
        $leggings=legging::where('productid','like',$clothName)->get();
        $generalCloth;
        $filename;
        if(count($womenCloth) != 0){
            $generalCloth=$womenCloth;
            $c=-1;
            if ($womenCloth[0]['color']!= ""){
                foreach(explode(',', $womenCloth[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',', $womenCloth[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='womenClothes';
                        break;
                    }
                }        
            }
        }
        elseif(count($menCloth) != 0 ){
            $generalCloth=$menCloth;
            $c=-1;
            if ($menCloth[0]['color']!= ""){
                foreach(explode(',', $menCloth[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',', $menCloth[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='menClothes';
                        break;
                    }
                }        
            }
        }
        elseif(count($kidBoyCloth) != 0 ){
            $generalCloth=$KidBoyCloth;
            $c=-1;
            if ($kidBoyCloth[0]['color']!= ""){
                foreach(explode(',', $kidBoyCloth[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',', $kidBoyCloth[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='kidsBoy';
                        break;
                    }
                }        
            }
        }
        elseif(count($kidGirlCloth) != 0){
            $generalCloth=$KidGirlCloth;
            $c=-1;
            if ($kidGirlCloth[0]['color']!= ""){
                foreach(explode(',', $kidGirlCloth[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',', $kidGirlCloth[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='kidsGirl';
                        break;
                    }
                }        
            }
        }
        elseif(count($tops) != 0){
            $generalCloth=$tops;
            $c=-1;
            if ($tops[0]['color']!= ""){
                foreach(explode(',', $tops[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',', $tops[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='tops';
                        break;
                    }
                }        
            }
        }
        elseif(count($bags) != 0){
            $generalCloth=$bags;
            $c=-1;
            if ($bags[0]['color']!= ""){
                foreach(explode(',', $bags[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',', $bags[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='bags';
                        break;
                    }
                }        
            }
        }
        elseif(count($shoes) != 0){
            $generalCloth=$shoes;
            $c=-1;
            if ($shoes[0]['color']!= ""){
                foreach(explode(',', $shoes[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',', $shoes[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='shoes';
                        break;
                    }
                }        
            }
        }
        elseif(count($sunglasses) != 0){
            $generalCloth=$sunglasses;
            $c=-1;
            if ($sunglasses[0]['color']!= ""){
                foreach(explode(',', $sunglasses[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',', $sunglasses[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='sunglassess';
                        break;
                    }
                }        
            }
        }
        elseif(count($shorts) != 0){
            $generalCloth=$shorts;
            $c=-1;
            if ($shorts[0]['color']!= ""){
                foreach(explode(',', $shorts[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',', $shorts[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='shorts';
                        break;
                    }
                }        
            }
        }
        elseif(count($leggings) != 0){
            $generalCloth=$leggings;
            $c=-1;
            if ( $leggings[0]['color']!= ""){
                foreach(explode(',',  $leggings[0]['color']) as $Colorinfo){ 
                    $c=$c+1;
                    $infophoto = explode(',',  $leggings[0]['image']); 
                    if($Colorinfo != "" && $color==$Colorinfo){
                        $photo=$infophoto[$c];
                        $filename='leggings';
                        break;
                    }
                }        
            }
        }
        return view('WomanClothes.showColor',compact('photo','$generalCloth','Colorinfo','filename'));
    }

    public function AddToCard(Request $request,$id,$image,$color){
        $womenCloth=womanCloth::where('productid','like',$id)->get();
        $menCloth=menCloth::where('productid','like',$id)->get();
        $kidBoyCloth=KidBoy::where('productid','like',$id)->get();
        $kidGirlCloth=KidGirl::where('productid','like',$id)->get();
        $tops=top::where('productid','like',$id)->get();
        $bags=Bag::where('productid','like',$id)->get();
        $shoes=shoes::where('productid','like',$id)->get();
        $sunglasses=Sunglasses::where('productid','like',$id)->get();
        $shorts=shorts::where('productid','like',$id)->get();
        $leggings=legging::where('productid','like',$id)->get();
        $generalCloth;
        $filename;
        $countid = Shopping_cart_visitor::where('id','like',$id)->count();
        // women
        if(count($womenCloth) != 0){
            if($countid>0){
                // return $countid;
                $women=womanCloth::where('productid','like',$id)->first();
                $women->bestseller=$countid;
                $women->save();
            } 
        $quant=0;
        $c=0;
        if($request->get('size') == 'small'){
           if($request->get('quantity') > $womenCloth[0]['small']){
               $quant = $womenCloth[0]['small'];
           }
           else{
            $quant = $request->get('quantity');
           }
        }
        elseif($request->get('size') == 'medium'){
            if($request->get('quantity') > $womenCloth[0]['medium']){
                $quant = $womenCloth[0]['medium'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'large'){
            if($request->get('quantity') > $womenCloth[0]['large']){
                $quant = $womenCloth[0]['large'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'xl'){
            if($request->get('quantity') > $womenCloth[0]['xl']){
                $quant = $womenCloth[0]['xl'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        $shoppingCart = new Shopping_cart_visitor([
            'id' => $womenCloth[0]['productid'],
            'name' => $womenCloth[0]['name'],
            'image' => $image,
            'quantity' => $quant,
            'color' => $color,
            'size'=> $request->get('size'),
            'price' => $womenCloth[0]['price'],
            'total' => $womenCloth[0]['total'],
            'tablename' => 'women',
        ]);
        $shoppingCart->save();
    }
    // men
    elseif(count($menCloth) != 0){
        if($countid>0){
            $men=manCloth::where('productid','like',$id)->first();
            $men->bestseller=$countid;
            $men->save();
        } 
    $quant=0;
    $c=0;
    if($request->get('size') == 'small'){
       if($request->get('quantity') > $menCloth[0]['small']){
           $quant = $menCloth[0]['small'];
       }
       else{
        $quant = $request->get('quantity');
       }
    }
    elseif($request->get('size') == 'medium'){
        if($request->get('quantity') > $menCloth[0]['medium']){
            $quant = $menCloth[0]['medium'];
        }
        else{
         $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'large'){
        if($request->get('quantity') > $menCloth[0]['large']){
            $quant = $menCloth[0]['large'];
        }
        else{
         $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'xl'){
        if($request->get('quantity') > $menCloth[0]['xl']){
            $quant = $menCloth[0]['xl'];
        }
        else{
         $quant = $request->get('quantity');
        }
    }
    $shoppingCart = new Shopping_cart_visitor([
        'id' => $menCloth[0]['productid'],
        'name' => $menCloth[0]['name'],
        'image' => $image,
        'quantity' => $quant,
        'color' => $color,
        'size'=> $request->get('size'),
        'price' => $menCloth[0]['price'],
        'total' => $menCloth[0]['total'],
        'tablename' => 'men',
    ]);
    $shoppingCart->save();
 }

   //  kidboy
     elseif(count($kidBoyCloth) != 0){
        if($countid>0){
            $kidboy=KidBoy::where('productid','like',$id)->first();
            $kidboy->bestseller=$countid;
            $kidboy->save();
        } 
    $quant=0;
    $c=0;
    if($request->get('size') == 'small'){
       if($request->get('quantity') > $kidBoyCloth[0]['small']){
           $quant = $kidBoyCloth[0]['small'];
       }
       else{
        $quant = $request->get('quantity');
       }
    }
    elseif($request->get('size') == 'medium'){
        if($request->get('quantity') > $kidBoyCloth[0]['medium']){
            $quant = $kidBoyCloth[0]['medium'];
        }
        else{
         $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'large'){
        if($request->get('quantity') > $kidBoyCloth[0]['large']){
            $quant = $kidBoyCloth[0]['large'];
        }
        else{
         $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'xl'){
        if($request->get('quantity') > $kidBoyCloth[0]['xl']){
            $quant = $kidBoyCloth[0]['xl'];
        }
        else{
         $quant = $request->get('quantity');
        }
    }
    $shoppingCart = new Shopping_cart_visitor([
        'id' => $kidBoyCloth[0]['productid'],
        'name' => $kidBoyCloth[0]['name'],
        'image' => $image,
        'quantity' => $quant,
        'color' => $color,
        'size'=> $request->get('size'),
        'price' => $kidBoyCloth[0]['price'],
        'total' => $kidBoyCloth[0]['total'],
        'tablename' => 'kidsboys',
    ]);
    $shoppingCart->save();
   }
    // kidgirl
    elseif(count($kidGirlCloth) != 0){
        if($countid>0){
            $kidgirl=KidGirl::where('productid','like',$id)->first();
            $kidgirl->bestseller=$countid;
            $kidgirl->save();
        } 
    $quant=0;
    $c=0;
    if($request->get('size') == 'small'){
    if($request->get('quantity') > $kidGirlCloth[0]['small']){
        $quant = $kidGirlCloth[0]['small'];
    }
    else{
        $quant = $request->get('quantity');
    }
    }
    elseif($request->get('size') == 'medium'){
        if($request->get('quantity') > $kidGirlCloth[0]['medium']){
            $quant = $kidGirlCloth[0]['medium'];
        }
        else{
        $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'large'){
        if($request->get('quantity') > $kidGirlCloth[0]['large']){
            $quant = $kidGirlCloth[0]['large'];
        }
        else{
        $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'xl'){
        if($request->get('quantity') > $kidGirlCloth[0]['xl']){
            $quant = $kidGirlCloth[0]['xl'];
        }
        else{
        $quant = $request->get('quantity');
        }
    }
    $shoppingCart = new Shopping_cart_visitor([
        'id' => $kidGirlCloth[0]['productid'],
        'name' => $kidGirlCloth[0]['name'],
        'image' => $image,
        'quantity' => $quant,
        'color' => $color,
        'size'=> $request->get('size'),
        'price' => $kidGirlCloth[0]['price'],
        'total' => $kidGirlCloth[0]['total'],
        'tablename' => 'kidsgirls',
    ]);
    $shoppingCart->save();
    }

    //  tops
    elseif(count($tops) != 0){
        if($countid>0){
            $top=top::where('productid','like',$id)->first();
            $top->bestseller=$countid;
            $top->save();
        } 
    
    $quant=0;
    $c=0;
    if($request->get('size') == 'small'){
       if($request->get('quantity') > $tops[0]['small']){
           $quant = $tops[0]['small'];
       }
       else{
        $quant = $request->get('quantity');
       }
    }
    elseif($request->get('size') == 'medium'){
        if($request->get('quantity') > $tops[0]['medium']){
            $quant = $tops[0]['medium'];
        }
        else{
         $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'large'){
        if($request->get('quantity') > $tops[0]['large']){
            $quant = $tops[0]['large'];
        }
        else{
         $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'xl'){
        if($request->get('quantity') > $tops[0]['xl']){
            $quant = $tops[0]['xl'];
        }
        else{
         $quant = $request->get('quantity');
        }
    }
    $shoppingCart = new Shopping_cart_visitor([
        'id' => $tops[0]['productid'],
        'name' => $tops[0]['name'],
        'image' => $image,
        'quantity' => $quant,
        'color' => $color,
        'size'=> $request->get('size'),
        'price' => $tops[0]['price'],
        'total' => $tops[0]['total'],
        'tablename' => 'tops',
    ]);
    $shoppingCart->save();
   }

    //  bags
    elseif(count($bags) != 0){
        if($countid>0){
            $bags=Bags::where('productid','like',$id)->first();
            $bags->bestseller=$countid;
            $bags->save();
        } 
    $quant=0;
    $c=0;
    $shoppingCart = new Shopping_cart_visitor([
        'id' => $bags[0]['productid'],
        'name' => $bags[0]['name'],
        'image' => $image,
        'quantity' => $quant,
        'color' => $color,
        'price' => $bags[0]['price'],
        'total' => $bags[0]['total'],
        'tablename' => 'bags',
    ]);
    $shoppingCart->save();
   }
        //  shoes
        elseif(count($shoes) != 0){
            if($countid>0){
                $shoes=Shoes::where('productid','like',$id)->first();
                $shoes->bestseller=$countid;
                $shoes->save();
            } 

        $quant=0;
        $c=0;
        if($request->get('size') == 'size_37'){
        if($request->get('quantity') > $shoes[0]['size_37']){
            $quant = $shoes[0]['size_37'];
        }
        else{
            $quant = $request->get('quantity');
        }
        }
        elseif($request->get('size') == 'size_38'){
            if($request->get('quantity') > $shoes[0]['size_38']){
                $quant = $shoes[0]['size_38'];
            }
            else{
            $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'size_39'){
            if($request->get('quantity') > $shoes[0]['size_39']){
                $quant = $shoes[0]['size_39'];
            }
            else{
            $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'size_40'){
            if($request->get('quantity') > $shoes[0]['size_40']){
                $quant = $shoes[0]['size_40'];
            }
            else{
            $quant = $request->get('quantity');
            }
        }
        $shoppingCart = new Shopping_cart_visitor([
            'id' => $shoes[0]['productid'],
            'name' => $shoes[0]['name'],
            'image' => $image,
            'quantity' => $quant,
            'color' => $color,
            'size'=> $request->get('size'),
            'price' => $shoes[0]['price'],
            'total' => $shoes[0]['total'],
            'tablename' => 'shoes',
        ]);
        $shoppingCart->save();
    }
     //  sunglasses
     elseif(count($sunglasses) != 0){
        if($countid>0){
            $sunglasses=Sunglasses::where('productid','like',$id)->first();
            $sunglasses->bestseller=$countid;
            $sunglasses->save();
        } 

    $quant=0;
    $c=0;
    $shoppingCart = new Shopping_cart_visitor([
        'id' => $sunglasses[0]['productid'],
        'name' => $sunglasses[0]['name'],
        'image' => $image,
        'quantity' => $quant,
        'price' => $sunglasses[0]['price'],
        'total' => $sunglasses[0]['total'],
        'tablename' => 'sunglasses',
    ]);
    $shoppingCart->save();
 }
    //  shorts
    elseif(count($shorts) != 0){
        if($countid>0){
            $shorts=Shorts::where('productid','like',$id)->first();
            $shorts->bestseller=$countid;
            $shorts->save();
        } 

    $quant=0;
    $c=0;
    if($request->get('size') == 'small'){
    if($request->get('quantity') > $shorts[0]['small']){
        $quant = $shorts[0]['small'];
    }
    else{
        $quant = $request->get('quantity');
    }
    }
    elseif($request->get('size') == 'medium'){
        if($request->get('quantity') > $shorts[0]['medium']){
            $quant = $shorts[0]['medium'];
        }
        else{
        $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'large'){
        if($request->get('quantity') > $shorts[0]['large']){
            $quant = $shorts[0]['large'];
        }
        else{
        $quant = $request->get('quantity');
        }
    }
    elseif($request->get('size') == 'xl'){
        if($request->get('quantity') > $shorts[0]['xl']){
            $quant = $shorts[0]['xl'];
        }
        else{
        $quant = $request->get('quantity');
        }
    }
    $shoppingCart = new Shopping_cart_visitor([
        'id' => $shorts[0]['productid'],
        'name' => $shorts[0]['name'],
        'image' => $image,
        'quantity' => $quant,
        'color' => $color,
        'size'=> $request->get('size'),
        'price' => $shorts[0]['price'],
        'total' => $shorts[0]['total'],
        'tablename' => 'shorts',
    ]);
    $shoppingCart->save();
 }
        //  leggings
        elseif(count($leggings) != 0){
            if($countid>0){
                $leggings=legging::where('productid','like',$id)->first();
                $leggings->bestseller=$countid;
                $leggings->save();
            } 

        $quant=0;
        $c=0;
        if($request->get('size') == 'small'){
        if($request->get('quantity') > $leggings[0]['small']){
            $quant = $leggings[0]['small'];
        }
        else{
            $quant = $request->get('quantity');
        }
        }
        elseif($request->get('size') == 'medium'){
            if($request->get('quantity') > $leggings[0]['medium']){
                $quant = $leggings[0]['medium'];
            }
            else{
            $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'large'){
            if($request->get('quantity') > $leggings[0]['large']){
                $quant = $leggings[0]['large'];
            }
            else{
            $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'xl'){
            if($request->get('quantity') > $leggings[0]['xl']){
                $quant = $leggings[0]['xl'];
            }
            else{
            $quant = $request->get('quantity');
            }
        }
        $shoppingCart = new Shopping_cart_visitor([
            'id' => $leggings[0]['productid'],
            'name' => $leggings[0]['name'],
            'image' => $image,
            'quantity' => $quant,
            'color' => $color,
            'size'=> $request->get('size'),
            'price' => $leggings[0]['price'],
            'total' => $leggings[0]['total'],
            'tablename' => 'leggings',
        ]);
        $shoppingCart->save();
        }
        $count = DB::table('shopping_cart_visitor')->count();
        Session::put('cart',$count);
        return redirect()->back();
    }
    public function bestsellerShow(){
        // $womenCloth=womanCloth::where('productid','like',$id)->get();
        // $best = DB::table('women_clothes')->orderBy('bestseller', 'asc')->get();
        // return $best;
        // return view('Home',compact('best',$best));
        // $menCloth=menCloth::where('productid','like',$id)->get();
        // $kidBoyCloth=KidBoy::where('productid','like',$id)->get();
        // $kidGirlCloth=KidGirl::where('productid','like',$id)->get();
        // $tops=top::where('productid','like',$id)->get();
        // $bags=Bag::where('productid','like',$id)->get();
        // $shoes=shoes::where('productid','like',$id)->get();
        // $sunglasses=Sunglasses::where('productid','like',$id)->get();
        // $shorts=shorts::where('productid','like',$id)->get();
        // $leggings=legging::where('productid','like',$id)->get();

    }

     

}

