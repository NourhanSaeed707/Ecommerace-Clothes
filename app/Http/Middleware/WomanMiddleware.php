<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\admin;

class WomanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {
        $nameView = Route::currentRouteName();
       // $adminn= admin::all();
    echo $nameView;
       // return response()->view('Admin.AdminLogin',compact('nameView'));
        $response = $next($req);
        echo 'beeeeeeeeeeeeeeefore';
        return response()->view('Admin.AdminLogin',compact('nameView'));
        // return 'fffffffffffffffffffffffffffffffffffffffffffff';
        // if($adminn[0]->email == $req->email && $adminn[0]->password == $req->password){
        //     // return 'iffffff';
        //      //return response()->route($nameView);
        //      return view($nameView);
        //      //return redirect($nameView);
        //  }
        //  else{
        //      return 'elllseee';
        //      //return redirect()->back()->with('fail','Email or Password incorrect');
        //  }
      
       // return $next($req);
       return $response;
    }
}
