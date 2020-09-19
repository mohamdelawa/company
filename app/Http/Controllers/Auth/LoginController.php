<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;
class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public  function  login(){
        if (Auth::check()){

            Auth::logout();
        }
        return view('auth.login');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticate(Request $request){

        $login =['email'=> $request->email , 'password'=>$request->password];
        if(Auth::attempt($login)) {
            $user = Auth::user();
            $user->status = "Active";
            $user->save();
            \Illuminate\Support\Facades\Cookie::queue('active_user',60*60*24);

            return redirect()->route('my_profile');
        }
        return redirect()->back()->withInput()->with('error','Login fails, please try again');
    }
    public  function  logout(){
        if (Auth::check()){
            $user = Auth::user();
            $user->status = "Inactive";
            $user->save();
            Auth::logout();
        }
        return redirect()->route('login');
    }
}
