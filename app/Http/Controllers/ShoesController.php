<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoes;
use Illuminate\Support\Facades\DB;
use App\Models\Shopping_cart_visitor;
use Illuminate\Support\Facades\Route;
use Session;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoes = Shoes::latest()->paginate(12);
        return view('Shoes.index',compact('shoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Shoes.create');
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
            'size_37' => 'required|numeric',
            'size_38' => 'required|numeric',
            'size_39' => 'required|numeric',
            'size_40' => 'required|numeric',
            'Colorimg1' => 'required',
            'image1' => 'required',
    ]);
    $dataColor='';
        if($request->hasfile('Colorimg1'))
        {
            $name=$request->file('Colorimg1')->getClientOriginalName();
            $request->file('Colorimg1')->move(public_path().'/images/'.'/shoes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        if($request->hasfile('Colorimg2'))
        {
            $name=$request->file('Colorimg2')->getClientOriginalName();
            $request->file('Colorimg2')->move(public_path().'/images/'.'/shoes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        if($request->hasfile('Colorimg3'))
        {
            $name=$request->file('Colorimg3')->getClientOriginalName();
            $request->file('Colorimg3')->move(public_path().'/images/'.'/shoes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        if($request->hasfile('Colorimg4'))
        {
            $name=$request->file('Colorimg4')->getClientOriginalName();
            $request->file('Colorimg4')->move(public_path().'/images/'.'/shoes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        $dataImage='';
        if($request->hasfile('image1'))
        {
            $name=$request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path().'/images/'.'/shoes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        if($request->hasfile('image2'))
        {
            $name=$request->file('image2')->getClientOriginalName();
            $request->file('image2')->move(public_path().'/images/'.'/shoes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        if($request->hasfile('image3'))
        {
            $name=$request->file('image3')->getClientOriginalName();
            $request->file('image3')->move(public_path().'/images/'.'/shoes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        if($request->hasfile('image4'))
        {
            $name=$request->file('image4')->getClientOriginalName();
            $request->file('image4')->move(public_path().'/images/'.'/shoes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $cloth = new Shoes([
      'productid' => $request->get('productCode'),
      'name' => $request->get('name'),
      'price' => $request->get('price'),
      'discount' => $request->get('discount'),
      'total' => $total,
      'size_37' => $request->get('size_37'),
      'size_38' => $request->get('size_38'),
      'size_39' => $request->get('size_39'),
      'size_40' => $request->get('size_40'),
      'color' => $dataColor ,
      'image' => $dataImage ,
   ]);
   $cloth->save();
   return redirect()->back()->with('message','New Shoes Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shoes=Shoes::where('productid','like',$id)->get();
        $kidInfo=$shoes;
        return view('Shoes.show',compact('shoes'));
    }
    public function showColor($color,$id){
       $shoes=Shoes::where('productid','like',$id)->get();
       $c=-1;
       if ($shoes[0]['color']!= ""){
            foreach(explode(',', $shoes[0]['color']) as $Colorinfo){ 
                $c=$c+1;
                $infophoto = explode(',', $shoes[0]['image']); 
                 if($Colorinfo != "" && $color==$Colorinfo){
                    $photo=$infophoto[$c];
                    return view('Shoes.showColor',compact('photo','shoes','Colorinfo'));
                    break;
                 }
              }        
        }
    }
    public function AddToCard(Request $request,$id,$image,$color){ 
        $shoes = Shoes::where('productid','like',$id)->get();
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
           if($request->get('quantity') > $shoes[0]['small']){
               $quant = $shoes[0]['small'];
       
           }
           else{
            $quant = $request->get('quantity');
           }
        }
        elseif($request->get('size') == 'medium'){
            if($request->get('quantity') > $shoes[0]['medium']){
                $quant = $shoes[0]['medium'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'large'){
            if($request->get('quantity') > $shoes[0]['large']){
                $quant = $shoes[0]['large'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'xl'){
            if($request->get('quantity') > $shoes[0]['xl']){
                $quant = $shoes[0]['xl'];
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
                'id' => $shoes[0]['productid'],
                'name' => $shoes[0]['name'],
                'image' => $image,
                'quantity' => $quant3,
                'color' => $color,
                'size'=> $request->get('size'),
                'price' => $shoes[0]['price'],
                'total' => $shoes[0]['total'],
                'tablename' => 'kidboy',
            ]);
            $shoppingCart->save();
        }
        if($countid>0){
            $shoes=Shoes::where('productid','like',$id)->first();
            $shoop = Shopping_cart_visitor::where('id','like',$id)->get();
            $shoes->bestseller=$shoop[0]['quantity'];
            $shoes->save();
        } 
        $count = DB::table('Shopping_cart_visitor')->sum('quantity');
        Session::put('cart',$count);
        return redirect()->back();
    }
    public function search(Request $req){
        $data=Shoes::where('productid','like',$req->get('productCode'))->get();
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
    public function edit(Request $req,Shoes $data)
    {
        $data=Shoes::where('productid','like',$req->get('productCode'))->get();
        return view('Shoes.edit',compact('data',$data));
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
    $bags=Shoes::where('productid','like',$request->get('productCode'))->first();
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $datas='';
        if($request->hasfile('image'))
        {
           foreach($request->file('image') as $images)
           {
               $name=$images->getClientOriginalName();
               $images->move(public_path().'/images/'.'/shoes', $name);
               $datas = $datas.$name.',';
           }
        }
    $shoes->productid = $request->get('productCode');
    $shoes->name = $request->get('name');
    $shoes->price = $request->get('price');
    $shoes->discount = $request->get('discount');
    $shoes->total = $total;
    $shoes->small = $request->get('small');
    $shoes->medium = $request->get('medium');
    $shoes->large = $request->get('large');
    $shoes->xl = $request->get('xl');
    $shoes->color = $request->get('color');
    $shoes->image = $datas;
    $shoes->save();
    return redirect()->back()->with('success','Shoes Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        DB::delete('delete from shoes where productid = ?', [$req->get('productCode')]);
        return redirect()->back()->with('success','Shoes Product Deleted Successfully!');
    }
}
