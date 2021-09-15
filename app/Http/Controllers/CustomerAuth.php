<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Auth;
// use AuthenticatesUsers;
class CustomerAuth extends Controller
{
    //
    // use AuthenticatesUsers;
    public function Login(Request $req){
       return view('CustomerAuth.Login');
    }
    public function Register(Request $req){
        return view('CustomerAuth.Register');
    }
    public function save(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',

        ]);
        $users = new User();
        $users->name = $req->name;
        $users->email = $req->email;
        $users->password = Hash::make($req->password);
        $save=$users->save();
        if($save){
           return back()->with('success','Sign Up successfully');
        }
        else{
            return back()->with('fails','Something went wrong');
        }
    }
    public function check(Request $req){
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',

        ]);
        $customerInfo = User::where('email', '=' , $req->email)->first();
        if(!$customerInfo){
          return back()->with('fails' ,'Your Email Incorrect');
        }
        else{
            if(Hash::check($req->password,$customerInfo->password)){
              $req->session()->put('LoggedCustomer',$customerInfo->name);
              $credential = [
                'email' => $req->email,
                'password' => $req->password,
               ];
            $remember_me  = ( !empty( $req->remember ) )? TRUE : FALSE;
            // return $remember_me;
            // if(Auth::attempt($credential)){
            //     // $user = User::where(["email" => $credential['email']])->first();
            //     // return $user;
            //     // Auth::login($user, $remember_me);
            //     return redirect('/home');
            // }
            if (Auth::attempt(['email' => $req->email, 'password' => $req->password],$remember_me)) {
                // The user is being remembered...
                // return redirect('/home');
            }

            // if (Auth::attempt(['email' => $req->email, 'password' => $req->password], $remember_me)) {
            //     // The user is being remembered...
            //     // return 'truee';
            //     return redirect('/home');
            // }

            }
            else{
                return back()->with('fails' ,'Your Password Incorrect');
            }
        }

    }

    public function logout(){
        session()->put('LoggedCustomer',null);
        return redirect('/home');
    }
    public function RememberMe(Request $req)
    {
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',

        ]);
        $credential = [
            'email' => $req->email,
            'password' => $req->password,
        ];
        $remember_me  = ( !empty( $req->remember_me ) )? TRUE : FALSE;
        // return $remember_me;
        // if(Auth::attempt($credential)){
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password],$remember_me)) {
            // $user = User::where(["email" => $credential['email']])->first();
            // return $user;
            // Auth::login($user, $remember_me);
            $user = auth()->user();

        // dd($user);
            return redirect('/home');
        }
        else{
            return back()->with('fails' ,'Email or Password incorrect');
        }

   }
}
