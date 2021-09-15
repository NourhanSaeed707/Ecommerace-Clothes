<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\top;
use Illuminate\Support\Facades\DB;
use App\Models\Shopping_cart_visitor;
use Illuminate\Support\Facades\Route;
use Session;

class topController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top = top::latest()->paginate(12);
        return view('Tops.index',compact('top'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tops.create');
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
            // 'color' => 'required|string',
            // 'image' => 'required',
            'Colorimg1' => 'required',
            'image1' => 'required',
            
    ]);
    // $data='';
    // if($request->hasfile('image'))
    // {
    //    foreach($request->file('image') as $images)
    //    {
    //        $name=$images->getClientOriginalName();
    //        $images->move(public_path().'/images/'.'/tops', $name);
    //        $data = $data.$name.',';
    //    }
    // }
    $dataColor='';
    if($request->hasfile('Colorimg1'))
    {
        $name=$request->file('Colorimg1')->getClientOriginalName();
        $request->file('Colorimg1')->move(public_path().'/images/'.'/tops'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    if($request->hasfile('Colorimg2'))
    {
        $name=$request->file('Colorimg2')->getClientOriginalName();
        $request->file('Colorimg2')->move(public_path().'/images/'.'/tops'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    if($request->hasfile('Colorimg3'))
    {
        $name=$request->file('Colorimg3')->getClientOriginalName();
        $request->file('Colorimg3')->move(public_path().'/images/'.'/tops'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    if($request->hasfile('Colorimg4'))
    {
        $name=$request->file('Colorimg4')->getClientOriginalName();
        $request->file('Colorimg4')->move(public_path().'/images/'.'/tops'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    $dataImage='';
    if($request->hasfile('image1'))
    {
        $name=$request->file('image1')->getClientOriginalName();
        $request->file('image1')->move(public_path().'/images/'.'/tops'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image2'))
    {
        $name=$request->file('image2')->getClientOriginalName();
        $request->file('image2')->move(public_path().'/images/'.'/tops'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image3'))
    {
        $name=$request->file('image3')->getClientOriginalName();
        $request->file('image3')->move(public_path().'/images/'.'/tops'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image4'))
    {
        $name=$request->file('image4')->getClientOriginalName();
        $request->file('image4')->move(public_path().'/images/'.'/tops'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $cloth = new top([
      'productid' => $request->get('productCode'),
      'name' => $request->get('name'),
      'price' => $request->get('price'),
      'discount' => $request->get('discount'),
      'total' => $total,
      'small' => $request->get('small'),
      'medium' => $request->get('medium'),
      'large' => $request->get('large'),
      'xl' => $request->get('xl'),
    //   'color' => $request->get('color'),
    //   'image' => $data,
     'color' => $dataColor ,
     'image' => $dataImage ,
   ]);
   $cloth->save();
   return redirect()->back()->with('message','New Fitness Legging Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $top=top::where('productid','like',$id)->get();
        $shortInfo=$top;
        return view('Tops.show',compact('top'));
    }
    public function showColor($color,$id){
       $top=top::where('productid','like',$id)->get();
       $c=-1;
       if ($top[0]['color']!= ""){
            foreach(explode(',', $top[0]['color']) as $Colorinfo){ 
                $c=$c+1;
                $infophoto = explode(',', $top[0]['image']); 
                 if($Colorinfo != "" && $color==$Colorinfo){
                    $photo=$infophoto[$c];
                    return view('Tops.showColor',compact('photo','top','Colorinfo'));
                    break;
                 }
              }        
        }
    }
    public function AddToCard(Request $request,$id,$image,$color){ 
        $top = top::where('productid','like',$id)->get();
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
           if($request->get('quantity') > $top[0]['small']){
               $quant = $top[0]['small'];
       
           }
           else{
            $quant = $request->get('quantity');
           }
        }
        elseif($request->get('size') == 'medium'){
            if($request->get('quantity') > $top[0]['medium']){
                $quant = $top[0]['medium'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'large'){
            if($request->get('quantity') > $top[0]['large']){
                $quant = $top[0]['large'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'xl'){
            if($request->get('quantity') > $top[0]['xl']){
                $quant = $top[0]['xl'];
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
            $shoppingCart = new Shopping_cart_visitor([
                'id' => $top[0]['productid'],
                'name' => $top[0]['name'],
                'image' => $image,
                'quantity' => $quant3,
                'color' => $color,
                'size'=> $request->get('size'),
                'price' => $top[0]['price'],
                'total' => $top[0]['total'],
                'tablename' => 'kidboy',
            ]);
            $shoppingCart->save();
        }
        if($countid>0){
            $top=top::where('productid','like',$id)->first();
            $shoop = Shopping_cart_visitor::where('id','like',$id)->get();
            $top->bestseller=$shoop[0]['quantity'];
            $top->save();
        } 
        $count = DB::table('Shopping_cart_visitor')->sum('quantity');
        Session::put('cart',$count);
        return redirect()->back();
    }
    public function search(Request $req){
        $data=top::where('productid','like',$req->get('productCode'))->get();
        if($data){
           $this->edit($data);
        }
        else{
             return redirect()->back()->with('fails','Product Code not found');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req,top $data)
    {
        $data=top::where('productid','like',$req->get('productCode'))->get();
        return view('Tops.edit',compact('data',$data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
    $legging=top::where('productid','like',$request->get('productCode'))->first();
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $datas='';
        if($request->hasfile('image'))
        {
           foreach($request->file('image') as $images)
           {
               $name=$images->getClientOriginalName();
               $images->move(public_path().'/images/'.'/tops', $name);
               $datas = $datas.$name.',';
           }
        }
    $tops->productid = $request->get('productCode');
    $tops->name = $request->get('name');
    $tops->price = $request->get('price');
    $tops->discount = $request->get('discount');
    $tops->total = $total;
    $tops->small = $request->get('small');
    $tops->medium = $request->get('medium');
    $tops->large = $request->get('large');
    $tops->xl = $request->get('xl');
    $tops->color = $request->get('color');
    $tops->image = $datas;
    $tops->save();
    return redirect()->back()->with('success','Top Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        DB::delete('delete from tops where productid = ?', [$req->get('productCode')]);
        return redirect()->back()->with('success','Top Product Deleted Successfully!');
    }
}
