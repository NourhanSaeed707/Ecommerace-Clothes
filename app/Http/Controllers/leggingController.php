<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\legging;
use Illuminate\Support\Facades\DB;
use App\Models\Shopping_cart_visitor;
use Illuminate\Support\Facades\Route;
use Session;

class leggingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legging = legging::latest()->paginate(12);
        return view('Leggings.index',compact('legging'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Leggings.create');
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
        $request->file('Colorimg1')->move(public_path().'/images/'.'/leggings'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    if($request->hasfile('Colorimg2'))
    {
        $name=$request->file('Colorimg2')->getClientOriginalName();
        $request->file('Colorimg2')->move(public_path().'/images/'.'/leggings'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    if($request->hasfile('Colorimg3'))
    {
        $name=$request->file('Colorimg3')->getClientOriginalName();
        $request->file('Colorimg3')->move(public_path().'/images/'.'/leggings'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    if($request->hasfile('Colorimg4'))
    {
        $name=$request->file('Colorimg4')->getClientOriginalName();
        $request->file('Colorimg4')->move(public_path().'/images/'.'/leggings'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    $dataImage='';
    if($request->hasfile('image1'))
    {
        $name=$request->file('image1')->getClientOriginalName();
        $request->file('image1')->move(public_path().'/images/'.'/leggings'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image2'))
    {
        $name=$request->file('image2')->getClientOriginalName();
        $request->file('image2')->move(public_path().'/images/'.'/leggings'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image3'))
    {
        $name=$request->file('image3')->getClientOriginalName();
        $request->file('image3')->move(public_path().'/images/'.'/leggings'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image4'))
    {
        $name=$request->file('image4')->getClientOriginalName();
        $request->file('image4')->move(public_path().'/images/'.'/leggings'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $cloth = new legging([
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
        $legging=legging::where('productid','like',$id)->get();
        $leggingInfo=$legging;
        return view('Leggings.show',compact('legging'));
    }
    public function showColor($color,$id){
       $legging=legging::where('productid','like',$id)->get();
       $c=-1;
       if ($legging[0]['color']!= ""){
            foreach(explode(',', $legging[0]['color']) as $Colorinfo){ 
                $c=$c+1;
                $infophoto = explode(',', $legging[0]['image']); 
                 if($Colorinfo != "" && $color==$Colorinfo){
                    $photo=$infophoto[$c];
                    return view('Leggings.showColor',compact('photo','legging','Colorinfo'));
                    break;
                 }
              }        
        }
    }
    public function AddToCard(Request $request,$id,$image,$color){ 
        $legging = legging::where('productid','like',$id)->get();
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
           if($request->get('quantity') > $legging[0]['small']){
               $quant = $legging[0]['small'];
       
           }
           else{
            $quant = $request->get('quantity');
           }
        }
        elseif($request->get('size') == 'medium'){
            if($request->get('quantity') > $legging[0]['medium']){
                $quant = $legging[0]['medium'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'large'){
            if($request->get('quantity') > $legging[0]['large']){
                $quant = $legging[0]['large'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'xl'){
            if($request->get('quantity') > $legging[0]['xl']){
                $quant = $legging[0]['xl'];
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
                'id' => $legging[0]['productid'],
                'name' => $legging[0]['name'],
                'image' => $image,
                'quantity' => $quant3,
                'color' => $color,
                'size'=> $request->get('size'),
                'price' => $legging[0]['price'],
                'total' => $legging[0]['total'],
                'tablename' => 'kidboy',
            ]);
            $shoppingCart->save();
        }
        if($countid>0){
            $legging=legging::where('productid','like',$id)->first();
            $shoop = Shopping_cart_visitor::where('id','like',$id)->get();
            $legging->bestseller=$shoop[0]['quantity'];
            $legging->save();
        } 
        $count = DB::table('Shopping_cart_visitor')->sum('quantity');
        Session::put('cart',$count);
        return redirect()->back();
    }
    public function search(Request $req){
        $data=legging::where('productid','like',$req->get('productCode'))->get();
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
    public function edit(Request $req,legging $data)
    {
        $data=legging::where('productid','like',$req->get('productCode'))->get();
        return view('Leggings.edit',compact('data',$data));
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
    $legging=legging::where('productid','like',$request->get('productCode'))->first();
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $datas='';
        if($request->hasfile('image'))
        {
           foreach($request->file('image') as $images)
           {
               $name=$images->getClientOriginalName();
               $images->move(public_path().'/images/'.'/leggings', $name);
               $datas = $datas.$name.',';
           }
        }
    $leggings->productid = $request->get('productCode');
    $leggings->name = $request->get('name');
    $leggings->price = $request->get('price');
    $leggings->discount = $request->get('discount');
    $leggings->total = $total;
    $leggings->small = $request->get('small');
    $leggings->medium = $request->get('medium');
    $leggings->large = $request->get('large');
    $leggings->xl = $request->get('xl');
    $leggings->color = $request->get('color');
    $leggings->image = $datas;
    $leggings->save();
    return redirect()->back()->with('success','Legging Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        DB::delete('delete from leggings where productid = ?', [$req->get('productCode')]);
        return redirect()->back()->with('success','Legging Product Deleted Successfully!');
    }
}
