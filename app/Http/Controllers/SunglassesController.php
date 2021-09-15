<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sunglasses;
use Illuminate\Support\Facades\DB;
use App\Models\Shopping_cart_visitor;
use Illuminate\Support\Facades\Route;
use Session;

class SunglassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sunglasses = Sunglasses::latest()->paginate(12);
        return view('Sunglasses.index',compact('sunglasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sunglasses.create');
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
            'image1' => 'required',
    ]);   
    $dataImage='';
    if($request->hasfile('image1'))
    {
        $name=$request->file('image1')->getClientOriginalName();
        $request->file('image1')->move(public_path().'/images/'.'/sunglasses'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image2'))
    {
        $name=$request->file('image2')->getClientOriginalName();
        $request->file('image2')->move(public_path().'/images/'.'/sunglasses'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image3'))
    {
        $name=$request->file('image3')->getClientOriginalName();
        $request->file('image3')->move(public_path().'/images/'.'/sunglasses'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image4'))
    {
        $name=$request->file('image4')->getClientOriginalName();
        $request->file('image4')->move(public_path().'/images/'.'/sunglasses'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $cloth = new Sunglasses([
      'productid' => $request->get('productCode'),
      'name' => $request->get('name'),
      'price' => $request->get('price'),
      'discount' => $request->get('discount'),
      'total' => $total,
      'image' => $dataImage ,
   ]);
   $cloth->save();
   return redirect()->back()->with('message','New Sunglasses Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sunglasses=Sunglasses::where('productid','like',$id)->get();
        $shortInfo=$sunglasses;
        return view('Sunglasses.show',compact('sunglasses'));
    }
    public function showColor($color,$id){
       $sunglasses=Sunglasses::where('productid','like',$id)->get();
       $c=-1;
       if ($sunglasses[0]['color']!= ""){
            foreach(explode(',', $sunglasses[0]['color']) as $Colorinfo){ 
                $c=$c+1;
                $infophoto = explode(',', $sunglasses[0]['image']); 
                 if($Colorinfo != "" && $color==$Colorinfo){
                    $photo=$infophoto[$c];
                    return view('Sunglasses.showColor',compact('photo','sunglasses','Colorinfo'));
                    break;
                 }
              }        
        }
    }
    public function AddToCard(Request $request,$id,$image){ 
        $sunglasses = Sunglasses::where('productid','like',$id)->get();
        $countid = Shopping_cart_visitor::where('id','like',$id)->count();
        $shoppingQuantity = Shopping_cart_visitor::where('id','like',$id)->get();
        $count1 = DB::table('shopping_cart_visitor')->count();
        $quant2=0;
        if( $count1 > 0 && count($shoppingQuantity) > 0 && 
        $shoppingQuantity[0]['size']==$request->get('size')   ){
            $quant2 = $shoppingQuantity[0]['quantity'];
            $pricee = $shoppingQuantity[0]['price'];
        }
        $quant=0;
        $c=0;
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
                'id' => $sunglasses[0]['productid'],
                'name' => $sunglasses[0]['name'],
                'image' => $image,
                'quantity' => $quant3,
                'price' => $sunglasses[0]['price'],
                'total' => $sunglasses[0]['total'],
                'tablename' => 'kidboy',
            ]);
            $shoppingCart->save();
        }
        if($countid>0){
            $sunglasses=Sunglasses::where('productid','like',$id)->first();
            $shoop = Shopping_cart_visitor::where('id','like',$id)->get();
            $sunglasses->bestseller=$shoop[0]['quantity'];
            $sunglasses->save();
        } 
        $count = DB::table('Shopping_cart_visitor')->sum('quantity');
        Session::put('cart',$count);
        return redirect()->back();
    }
    public function search(Request $req){
        $data=Sunglasses::where('productid','like',$req->get('productCode'))->get();
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
    public function edit(Request $req,Sunglasses $data)
    {
        $data=Bag::where('productid','like',$req->get('productCode'))->get();
        return view('Sunglasses.edit',compact('data',$data));
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
            'color' => 'required|string',
            'image' => 'required',
    ]);
    $bags=Sunglasses::where('productid','like',$request->get('productCode'))->first();
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $datas='';
        if($request->hasfile('image'))
        {
           foreach($request->file('image') as $images)
           {
               $name=$images->getClientOriginalName();
               $images->move(public_path().'/images/'.'/sunglasses', $name);
               $datas = $datas.$name.',';
           }
        }
    $sunglasses->productid = $request->get('productCode');
    $sunglasses->name = $request->get('name');
    $sunglasses->price = $request->get('price');
    $sunglasses->discount = $request->get('discount');
    $sunglasses->total = $total;
    $sunglasses->small = $request->get('small');
    $sunglasses->medium = $request->get('medium');
    $sunglasses->large = $request->get('large');
    $sunglasses->xl = $request->get('xl');
    $sunglasses->color = $request->get('color');
    $sunglasses->image = $datas;
    $sunglasses->save();
    return redirect()->back()->with('success','Sunglasses Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        DB::delete('delete from sunglasses where productid = ?', [$req->get('productCode')]);
        return redirect()->back()->with('success','Sunglasses Product Deleted Successfully!');
    }
}
