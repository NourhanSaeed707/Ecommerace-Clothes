<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\WomanMiddleware;
use Illuminate\Support\Facades\Route;

class adminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('EnsureUserHasRole');

    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.AdminRegister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',

        ]);
        // return admin::count();
        if(admin::count() === 0 ){
            $adminn = new admin([
                'email' => $request->email,
                'password' => $request->password,
            ]);
            $adminn->save();
            return redirect()->back()->with('success','New Admin Added Successfully.');
        }
        else{
            return redirect()->back()->with('registerMessage','You Already Registered...');
        }
    }
    public function AdminPage(Request $request){
        return 'ssssssssssooooooo';
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',

        ]);
        // return 'before';
        $adminInfo = admin::all();
        // return $adminInfo;
        // return $adminInfo[0]->email;
        if($adminInfo[0]->email == $request->email && $adminInfo[0]->password == $request->password){
            // return $adminInfo[0]->email;
            return view('Admin.homeAdmin');
        }
        else{
            // return 'sssssssssss';
            return redirect()->back()->with('fail','Your Email Or Password Incorrect.');
        }
    }

    public function check (Request $req,$path){
        // return 'cheeeck';
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',

        ]);
        // echo $path; echo '.................................';
        $adminn = admin::all();
        if($adminn[0]->email === $req->email && $adminn[0]->password === $req->password){
            // $nameView = Route::currentRouteName();
            // echo $nameView;
            // return 'ttttreu';
            // echo '................................. ';
            // echo $path;
            // return redirect::route($path);
            // echo route($path);
            if($path == 'womenClothes.create'){
                return view('WomanClothes.create');
            }
            else if($path == 'womanClothes.search'){
                return view('WomanClothes.search');
            }
            else if($path == 'WomenClothes.Delete'){
                return view('WomanClothes.delete');
            }
            else if($path == 'menClothes.create'){
                return view('MenClothes.create');
            }
            else if($path == 'menClothes.search'){
                return view('menClothes.search');
            }
            else if($path == 'menClothes.Delete'){
                return view('MenClothes.delete');
            }
            else if($path == 'leggings.create'){
                return view('Leggings.create');
            }
            else if($path == 'leggings.search'){
                return view('Leggings.search');
            }
            else if($path == 'leggings.Deletee'){
                return view('Leggings.delete');
            }
            else if($path == 'tops.create'){
                return view('Tops.create');
            }
            else if($path == 'tops.search'){
                return view('Tops.search');
            }
            else if($path == 'tops.Deletee'){
                return view('Tops.delete');
            }
            else if($path == 'shorts.create'){
                return view('Shorts.create');
            }
            else if($path == 'shorts.search'){
                return view('Shorts.search');
            }
            else if($path == 'shorts.Deletee'){
                return view('Shorts.delete');
            }
            else if($path == 'Kidgirl.create'){
                return view('KidsGirl.create');
            }
            else if($path == 'Kidgirl.search'){
                return view('KidsGirl.search');
            }
            else if($path == 'Kidgirl.Deletee'){
                return view('KidsGirl.delete');
            }
            else if($path == 'KidBoys.create'){
                return view('KidsBoy.create');
            }
            else if($path == 'KidBoys.search'){
                return view('KidsBoy.search');
            }
            else if($path == 'KidBoys.Deletee'){
                return view('KidsBoy.delete');
            }
            else if($path == 'Bags.create'){
                return view('Bags.create');
            }
            else if($path == 'Bags.search'){
                return view('Bags.search');
            }
            else if($path == 'Bags.Deletee'){
                return view('Bags.delete');
            }
            else if($path == 'shoes.create'){
                return view('Shoes.create');
            }
            else if($path == 'shoess.search'){
                return view('Shoes.search');
            }
            else if($path == 'shoess.Deletee'){
                return view('Shoes.delete');
            }
            else if($path == 'sunglasses.create'){
                return view('Sunglasses.create');
            }
            else if($path == 'sunglassess.search'){
                return view('Sunglasses.search');
            }
            else if($path == 'sunglassess.Delete'){
                return view('Sunglasses.delete');
            }
            // return redirect()->route( $path);

            // return view('WomanClothes.create');
        }
        else {
             return redirect()->back()->with('fails','Incorrect Email Or Password');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function checkAuth(Request $req,$path){
        //return $path;
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
            else if($path == 'menClothes.create'){
                return view('MenClothes.create');
            }
            else if($path == 'menClothes.search'){
                return view('menClothes.search');
            }
            else if($path == 'MenClothes.Delete'){
                return view('MenClothes.delete');
            }
            else if($path == 'leggings.create'){
                return view('Leggings.create');
            }
            else if($path == 'leggings.search'){
                return view('Leggings.search');
            }
            else if($path == 'leggings.Deletee'){
                return view('Leggings.delete');
            }
            else if($path == 'tops.create'){
                return view('Tops.create');
            }
            else if($path == 'tops.search'){
                return view('Tops.search');
            }
            else if($path == 'tops.Deletee'){
                return view('Tops.delete');
            }
            else if($path == 'shorts.create'){
                return view('Shorts.create');
            }
            else if($path == 'shorts.search'){
                return view('Shorts.search');
            }
            else if($path == 'shorts.Deletee'){
                return view('Shorts.delete');
            }
            else if($path == 'Kidgirl.create'){
                return view('KidsGirl.create');
            }
            else if($path == 'Kidgirl.search'){
                return view('KidsGirl.search');
            }
            else if($path == 'Kidgirl.Deletee'){
                return view('KidsGirl.delete');
            }
            else if($path == 'KidBoys.create'){
                return view('KidsBoy.create');
            }
            else if($path == 'KidBoys.search'){
                return view('KidsBoy.search');
            }
            else if($path == 'KidBoys.Deletee'){
                return view('KidsBoy.delete');
            }
            else if($path == 'Bags.create'){
                return view('Bags.create');
            }
            else if($path == 'Bags.search'){
                return view('Bags.search');
            }
            else if($path == 'Bags.Deletee'){
                return view('Bags.delete');
            }
            else if($path == 'shoes.create'){
                return view('Shoes.create');
            }
            else if($path == 'shoess.search'){
                return view('Shoes.search');
            }
            else if($path == 'shoess.Deletee'){
                return view('Shoes.delete');
            }
            else if($path == 'sunglasses.create'){
                return view('Sunglasses.create');
            }
            else if($path == 'sunglassess.search'){
                return view('Sunglasses.search');
            }
            else if($path == 'sunglassess.Delete'){
                return view('Sunglasses.delete');
            }
        }
        else{
            return redirect()->back()->with('fail','Email or Password incorrect');
        }
    }
}
