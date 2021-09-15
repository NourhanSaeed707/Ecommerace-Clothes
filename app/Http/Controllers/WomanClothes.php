<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\womanCloth;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\WomanMiddleware;
use Illuminate\Support\Facades\Route;
use App\Models\admin;
use App\Models\Shopping_cart_customer;
use App\Models\Shopping_cart_visitor;
use Session;

class WomanClothes extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $womenClothes = womanCloth::latest()->paginate(12);
        return view('WomanClothes.index',compact('womenClothes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('WomanClothes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'productCode' =>'required|numeric',
                'name' => 'required|string',
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
                'small' => 'required|numeric',
                'medium' => 'required|numeric',
                'large' => 'required|numeric',
                'xl' => 'required|numeric',
                'Colorimg1' => 'required',
                'image1' => 'required',
        ]);
        $dataColor='';
        if($request->hasfile('Colorimg1'))
        {
            $name=$request->file('Colorimg1')->getClientOriginalName();
            $request->file('Colorimg1')->move(public_path().'/images/'.'/womenClothes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        if($request->hasfile('Colorimg2'))
        {
            $name=$request->file('Colorimg2')->getClientOriginalName();
            $request->file('Colorimg2')->move(public_path().'/images/'.'/womenClothes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        if($request->hasfile('Colorimg3'))
        {
            $name=$request->file('Colorimg3')->getClientOriginalName();
            $request->file('Colorimg3')->move(public_path().'/images/'.'/womenClothes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        if($request->hasfile('Colorimg4'))
        {
            $name=$request->file('Colorimg4')->getClientOriginalName();
            $request->file('Colorimg4')->move(public_path().'/images/'.'/womenClothes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        $dataImage='';
        if($request->hasfile('image1'))
        {
            $name=$request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path().'/images/'.'/womenClothes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        if($request->hasfile('image2'))
        {
            $name=$request->file('image2')->getClientOriginalName();
            $request->file('image2')->move(public_path().'/images/'.'/womenClothes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        if($request->hasfile('image3'))
        {
            $name=$request->file('image3')->getClientOriginalName();
            $request->file('image3')->move(public_path().'/images/'.'/womenClothes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        if($request->hasfile('image4'))
        {
            $name=$request->file('image4')->getClientOriginalName();
            $request->file('image4')->move(public_path().'/images/'.'/womenClothes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
        $cloth = new womanCloth([
          'productid' => $request->get('productCode'),
          'name' => $request->get('name'),
          'price' => $request->get('price'),
          'discount' => $request->get('discount'),
          'total' => $total,
          'small' => $request->get('small'),
          'medium' => $request->get('medium'),
          'large' => $request->get('large'),
          'xl' => $request->get('xl'),
          'color' => $dataColor ,
          'image' => $dataImage ,
       ]);
       $cloth->save();
       return redirect()->back()->with('message','New Woman Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $womenCloth=womanCloth::where('productid','like',$id)->get();
        $womaanInfo=$womenCloth;
        return view('WomanClothes.show',compact('womenCloth'));
    }
    public function showColor($color,$id){
       $womenCloth=womanCloth::where('productid','like',$id)->get();
       $c=-1;
       if ($womenCloth[0]['color']!= ""){
            foreach(explode(',', $womenCloth[0]['color']) as $Colorinfo){ 
                $c=$c+1;
                $infophoto = explode(',', $womenCloth[0]['image']); 
                 if($Colorinfo != "" && $color==$Colorinfo){
                    $photo=$infophoto[$c];
                    return view('WomanClothes.showColor',compact('photo','womenCloth','Colorinfo'));
                    break;
                 }
              }        
        }
    }
    public function AddToCard(Request $request,$id,$image,$color){ 
        $womenCloth = womanCloth::where('productid','like',$id)->get();
        $countid = Shopping_cart_visitor::where('id','like',$id)->count();
        $shoppingQuantity = Shopping_cart_visitor::where('id','like',$id)->get();
        $count1 = DB::table('shopping_cart_visitor')->count();
        $quant2=0;
        if( $count1 > 0 && count($shoppingQuantity) > 0 && 
        $shoppingQuantity[0]['size']==$request->get('size')  && $shoppingQuantity[0]['color'] ==$color ){
            $quant2 = $shoppingQuantity[0]['quantity'];
            $pricee = $shoppingQuantity[0]['price'];
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
        $quant3=0;
        if($quant2 > 0){
            $total = 1;
            $quant3 = $quant + $quant2;
            $shoppingQuantity[0]['quantity']=$quant3;
            $total = $quant3 * $shoppingQuantity[0]['total'];
            $shoppingQuantity[0]['price'] = $pricee * $quant3;
            $shoppingQuantity[0]['total'] = $shoppingQuantity[0]['total'] * $quant3 ;
            $shoppingQuantity[0]->save();
        }
        else{
            $quant3 = $quant;
            // $total = 1;
            $shoppingCart = new Shopping_cart_visitor([
                'id' => $womenCloth[0]['productid'],
                'name' => $womenCloth[0]['name'],
                'image' => $image,
                // 'quantity' => $request->get('quantity'),
                'quantity' => $quant3,
                'color' => $color,
                'size'=> $request->get('size'),
                'price' => $womenCloth[0]['price'],
                'total' => $womenCloth[0]['total'],
                'tablename' => 'women',
            ]);
            $shoppingCart->save();
        }
        if($countid>0){
            $women=womanCloth::where('productid','like',$id)->first();
            $shoop = Shopping_cart_visitor::where('id','like',$id)->get();
            $women->bestseller=$shoop[0]['quantity'];
            $women->save();
        } 
        $count = DB::table('Shopping_cart_visitor')->sum('quantity');
        Session::put('cart',$count);
        return redirect()->back();
    }
    public function search(Request $req){
        $data=womanCloth::where('productid','like',$req->get('productCode'))->get();
        if($data){
           $this->edit($data);
        }
        else{
             return redirect()->back()->with('fails','Product Code not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *@param  \App\Models\womanCloth $women
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req,womanCloth $data)
    {
        $data=womanCloth::where('productid','like',$req->get('productCode'))->get();
        return view('WomanClothes.edit',compact('data',$data));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
     * @param  \App\Models\womanCloth $women
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'productCode' =>'required|numeric',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'small' => 'required|numeric',
            'medium' => 'required|numeric',
            'large' => 'required|numeric',
            'xl' => 'required|numeric',
            'color' => 'required|string',
            'image' => 'required',
    ]);
    $women=womanCloth::where('productid','like',$request->get('productCode'))->first();
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $datas='';
        if($request->hasfile('image'))
        {
           foreach($request->file('image') as $images)
           {
               $name=$images->getClientOriginalName();
               $images->move(public_path().'/images/'.'/womenClothes', $name);
               $datas = $datas.$name.',';
           }
        }
    $women->productid = $request->get('productCode');
    $women->name = $request->get('name');
    $women->price = $request->get('price');
    $women->discount = $request->get('discount');
    $women->total = $total;
    $women->small = $request->get('small');
    $women->medium = $request->get('medium');
    $women->large = $request->get('large');
    $women->xl = $request->get('xl');
    $women->color = $request->get('color');
    $women->image = $datas;
    $women->save();
    return redirect()->back()->with('success','Women Product Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        DB::delete('delete from women_clothes where productid = ?', [$req->get('productCode')]);
        return redirect()->back()->with('success','Woman Product Deleted Successfully!');
    }
    public function checkAuth(Request $req,$path){
        $adminn = admin::all();
        if($adminn[0]->email == $req->email && $adminn[0]->password == $req->password){
            if($path == 'womenClothes.create'){
                return view('WomanClothes.create');
            }
            else if($path == 'womanClothes.search'){
                return view('WomanClothes.search');
            }
            else if($path == 'WomenClothes.Delete'){
                return view('WomanClothes.delete');
            }
        }
        else{
            return redirect()->back()->with('fail','Email or Password incorrect');
        }
    }
}
