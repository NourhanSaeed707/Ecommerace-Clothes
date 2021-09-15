<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menCloth;
use Illuminate\Support\Facades\DB;
use App\Models\admin;
use App\Models\Shopping_cart_customer;
use Illuminate\Support\Facades\Route;
use Session;


class menClothes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menClothes = menCloth::latest()->paginate(12);
        return view('MenClothes.index',compact('menClothes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MenClothes.create');
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
            // 'color' => 'required|alpha',
            // 'image' => 'required',
            'Colorimg1' => 'required',
            'image1' => 'required',
            // 'Colorimg2' => 'required',
            // 'image2' => 'required',
            // 'Colorimg3' => 'required',
            // 'image3' => 'required',
            // 'Colorimg4' => 'required',
            // 'image4' => 'required',
        ]);
        $dataColor='';
        if($request->hasfile('Colorimg1'))
        {
            $name=$request->file('Colorimg1')->getClientOriginalName();
            $request->file('Colorimg1')->move(public_path().'/images/'.'/menClothes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        if($request->hasfile('Colorimg2'))
        {
            $name=$request->file('Colorimg2')->getClientOriginalName();
            $request->file('Colorimg2')->move(public_path().'/images/'.'/menClothes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        if($request->hasfile('Colorimg3'))
        {
            $name=$request->file('Colorimg3')->getClientOriginalName();
            $request->file('Colorimg3')->move(public_path().'/images/'.'/menClothes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        if($request->hasfile('Colorimg4'))
        {
            $name=$request->file('Colorimg4')->getClientOriginalName();
            $request->file('Colorimg4')->move(public_path().'/images/'.'/menClothes'.'/color', $name);
            $dataColor = $dataColor.$name.',';
        }
        $dataImage='';
        if($request->hasfile('image1'))
        {
            $name=$request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path().'/images/'.'/menClothes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        if($request->hasfile('image2'))
        {
            $name=$request->file('image2')->getClientOriginalName();
            $request->file('image2')->move(public_path().'/images/'.'/menClothes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        if($request->hasfile('image3'))
        {
            $name=$request->file('image3')->getClientOriginalName();
            $request->file('image3')->move(public_path().'/images/'.'/menClothes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        if($request->hasfile('image4'))
        {
            $name=$request->file('image4')->getClientOriginalName();
            $request->file('image4')->move(public_path().'/images/'.'/menClothes'.'/clothes', $name);
            $dataImage = $dataImage.$name.',';
        }
        // if($request->hasfile('image'))
        // {
        //     foreach($request->file('image') as $images)
        //     {
        //         $name=$images->getClientOriginalName();
        //         $images->move(public_path().'/images/'.'/womenClothes', $name);
        //         $data = $data.$name.',';
        //     }
        // }
        $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
        $cloth = new menCloth([
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
        return redirect()->back()->with('message','New Men Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $menCloth=menCloth::where('productid','like',$id)->get();
        $manInfo=$menCloth;
        return view('MenClothes.show',compact('menCloth'));
    }
    public function showColor($color,$id){
       $menCloth=menCloth::where('productid','like',$id)->get();
       $c=-1;
       if ($menCloth[0]['color']!= ""){
            foreach(explode(',', $menCloth[0]['color']) as $Colorinfo){ 
                $c=$c+1;
                $infophoto = explode(',', $menCloth[0]['image']); 
                 if($Colorinfo != "" && $color==$Colorinfo){
                    $photo=$infophoto[$c];
                    return view('MenClothes.showColor',compact('photo','menCloth','Colorinfo'));
                    break;
                 }
              }        
        }
    }
    public function AddToCard(Request $request,$id,$image,$color){ 
        $menCloth = menCloth::where('productid','like',$id)->get();
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
                'id' => $menCloth[0]['productid'],
                'name' => $menCloth[0]['name'],
                'image' => $image,
                'quantity' => $quant3,
                'color' => $color,
                'size'=> $request->get('size'),
                'price' => $menCloth[0]['price'],
                'total' => $menCloth[0]['total'],
                'tablename' => 'men',
            ]);
            $shoppingCart->save();
        }
        if($countid>0){
            $men=menCloth::where('productid','like',$id)->first();
            // return $id;
            $shoop = Shopping_cart_visitor::where('id','like',$id)->get();
            // return $shoop[0]['quantity'];
            $men->bestseller=$shoop[0]['quantity'];
            $men->save();
        } 
        $count = DB::table('Shopping_cart_visitor')->sum('quantity');
        Session::put('cart',$count);
        return redirect()->back();
    }
    public function search(Request $req){
        $data=menCloth::where('productid','like',$req->get('productCode'))->get();
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

    public function edit(Request $req,menCloth $data)
    {
        $data=menCloth::where('productid','like',$req->get('productCode'))->get();
        return view('WomanClothes.edit',compact('data',$data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
    $men=menCloth::where('productid','like',$request->get('productCode'))->first();
    $total = round((1-($request->get('discount')/100)) *  $request->get('price'),2);
    $datas='';
        if($request->hasfile('image'))
        {
           foreach($request->file('image') as $images)
           {
               $name=$images->getClientOriginalName();
               $images->move(public_path().'/images/'.'/menClothes', $name);
               $datas = $datas.$name.',';
           }
        }
    $men->productid = $request->get('productCode');
    $men->name = $request->get('name');
    $men->price = $request->get('price');
    $men->discount = $request->get('discount');
    $men->total = $total;
    $men->small = $request->get('small');
    $men->medium = $request->get('medium');
    $men->large = $request->get('large');
    $men->xl = $request->get('xl');
    $men->color = $request->get('color');
    $men->image = $datas;
    $men->save();
    return redirect()->back()->with('success','Man Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        DB::delete('delete from men_clothes where productid = ?', [$req->get('productCode')]);
        return redirect()->back()->with('success','Men Product Deleted Successfully!');
    }
 
}
