<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // echo $request->email;
        // $uri = $request->path();
        // echo $uri;
        // echo '////////////////////////////';
        // echo $request;
        // echo '////////////////////////////////////////';
        // $nameView = Route::currentRouteName();
        // echo $nameView;
        // echo'.......................';
        // $adminn= admin::all();
        // echo '...................';
        // echo $adminn[0]->email;
        // echo '...................';
        // echo $adminn[0]->password;
        // echo $adminn;

        // if($adminn[0]->email == $request->email && $adminn[0]->password==$request->password){
        //     echo 'ssssssss';
        //     return response()->view($nameView);
        //     // return $next($request);
        //  }
        // else if (empty($request->input('email'))){
        //     echo $request->input('email');
        //     echo 'faaaaaaaaaalse';
        //     return response()->view('Admin.AdminLogin');
        // }
        // $nameView = Route::currentRouteName();
        // echo $nameView;
        // if(empty($request->email) && empty($request->password)
        //  || $request->email != $adminn[0]->email ||$adminn[0]->password!=$request->password){
        //     echo 'ifffffffffff';
        //     //return $adminn[0]->email;
        //     return response()->view('Admin.AdminLogin',compact('nameView'));
        //  }
        // else{
        //     echo'elseee';
        //      return response()->view($nameView);
        //  }




        



         return $next($request);
    }
}
