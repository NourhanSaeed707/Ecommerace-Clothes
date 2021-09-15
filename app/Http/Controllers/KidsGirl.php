<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KidGirl;
use Illuminate\Support\Facades\DB;
use App\Models\Shopping_cart_visitor;
use Illuminate\Support\Facades\Route;
use Session;

class KidsGirl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kidgirlClothes = kidGirl::latest()->paginate(12);
        return view('KidsGirl.index',compact('kidgirlClothes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('KidsGirl.create');
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
    //        $images->move(public_path().'/images/'.'/kidsGirl', $name);
    //        $data = $data.$name.',';
    //    }
    // }
    $dataColor='';
    if($request->hasfile('Colorimg1'))
    {
        $name=$request->file('Colorimg1')->getClientOriginalName();
        $request->file('Colorimg1')->move(public_path().'/images/'.'/kidsGirl'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    if($request->hasfile('Colorimg2'))
    {
        $name=$request->file('Colorimg2')->getClientOriginalName();
        $request->file('Colorimg2')->move(public_path().'/images/'.'/kidsGirl'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    if($request->hasfile('Colorimg3'))
    {
        $name=$request->file('Colorimg3')->getClientOriginalName();
        $request->file('Colorimg3')->move(public_path().'/images/'.'/kidsGirl'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    if($request->hasfile('Colorimg4'))
    {
        $name=$request->file('Colorimg4')->getClientOriginalName();
        $request->file('Colorimg4')->move(public_path().'/images/'.'/kidsGirl'.'/color', $name);
        $dataColor = $dataColor.$name.',';
    }
    $dataImage='';
    if($request->hasfile('image1'))
    {
        $name=$request->file('image1')->getClientOriginalName();
        $request->file('image1')->move(public_path().'/images/'.'/kidsGirl'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image2'))
    {
        $name=$request->file('image2')->getClientOriginalName();
        $request->file('image2')->move(public_path().'/images/'.'/kidsGirl'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image3'))
    {
        $name=$request->file('image3')->getClientOriginalName();
        $request->file('image3')->move(public_path().'/images/'.'/kidsGirl'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    if($request->hasfile('image4'))
    {
        $name=$request->file('image4')->getClientOriginalName();
        $request->file('image4')->move(public_path().'/images/'.'/kidsGirl'.'/clothes', $name);
        $dataImage = $dataImage.$name.',';
    }
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $cloth = new KidGirl([
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
   return redirect()->back()->with('message','New Kids Girl Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kidgirlCloth=kidGirl::where('productid','like',$id)->get();
        $kidInfo=$kidgirlCloth;
        return view('kidsgirl.show',compact('kidgirlCloth'));
    }
    public function showColor($color,$id){
       $kidgirlCloth=kidGirl::where('productid','like',$id)->get();
       $c=-1;
       if ($kidgirlCloth[0]['color']!= ""){
            foreach(explode(',', $kidgirlCloth[0]['color']) as $Colorinfo){ 
                $c=$c+1;
                $infophoto = explode(',', $kidgirlCloth[0]['image']); 
                 if($Colorinfo != "" && $color==$Colorinfo){
                    $photo=$infophoto[$c];
                    return view('kidsgirlClothes.showColor',compact('photo','kidgirlCloth','Colorinfo'));
                    break;
                 }
              }        
        }
    }
    public function AddToCard(Request $request,$id,$image,$color){ 
        $kidgirlCloth = kidGirl::where('productid','like',$id)->get();
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
           if($request->get('quantity') > $kidgirlCloth[0]['small']){
               $quant = $kidgirlCloth[0]['small'];
       
           }
           else{
            $quant = $request->get('quantity');
           }
        }
        elseif($request->get('size') == 'medium'){
            if($request->get('quantity') > $kidgirlCloth[0]['medium']){
                $quant = $kidgirlCloth[0]['medium'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'large'){
            if($request->get('quantity') > $kidgirlCloth[0]['large']){
                $quant = $kidgirlCloth[0]['large'];
            }
            else{
             $quant = $request->get('quantity');
            }
        }
        elseif($request->get('size') == 'xl'){
            if($request->get('quantity') > $kidgirlCloth[0]['xl']){
                $quant = $kidgirlCloth[0]['xl'];
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
                'id' => $kidgirlCloth[0]['productid'],
                'name' => $kidgirlCloth[0]['name'],
                'image' => $image,
                'quantity' => $quant3,
                'color' => $color,
                'size'=> $request->get('size'),
                'price' => $kidgirlCloth[0]['price'],
                'total' => $kidgirlCloth[0]['total'],
                'tablename' => 'kidgirl',
            ]);
            $shoppingCart->save();
        }
        if($countid>0){
            $kidgirl=kidGirl::where('productid','like',$id)->first();
            $shoop = Shopping_cart_visitor::where('id','like',$id)->get();
            $kidgirl->bestseller=$shoop[0]['quantity'];
            $kidgirl->save();
        } 
        $count = DB::table('Shopping_cart_visitor')->sum('quantity');
        Session::put('cart',$count);
        return redirect()->back();
    }
    public function search(Request $req){
        $data=KidGirl::where('productid','like',$req->get('productCode'))->get();
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
    public function edit(Request $req,KidGirl $data)
    {
        $data=KidGirl::where('productid','like',$req->get('productCode'))->get();
        return view('KidsGirl.edit',compact('data',$data));
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
    $kidsGirl=kidGirl::where('productid','like',$request->get('productCode'))->first();
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $datas='';
        if($request->hasfile('image'))
        {
           foreach($request->file('image') as $images)
           {
               $name=$images->getClientOriginalName();
               $images->move(public_path().'/images/'.'/kidsGirl', $name);
               $datas = $datas.$name.',';
           }
        }
    $kidsGirl->productid = $request->get('productCode');
    $kidsGirl->name = $request->get('name');
    $kidsGirl->price = $request->get('price');
    $kidsGirl->discount = $request->get('discount');
    $kidsGirl->total = $total;
    $kidsGirl->small = $request->get('small');
    $kidsGirl->medium = $request->get('medium');
    $kidsGirl->large = $request->get('large');
    $kidsGirl->xl = $request->get('xl');
    $kidsGirl->color = $request->get('color');
    $kidsGirl->image = $datas;
    $kidsGirl->save();
    return redirect()->back()->with('success','kid Girl Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        DB::delete('delete from kids_girls where productid = ?', [$req->get('productCode')]);
        return redirect()->back()->with('success','Kid Girl Product Deleted Successfully!');
    }
}
