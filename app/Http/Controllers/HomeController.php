<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class HomeController extends Controller
{
    function signup (Request $request){
  $valid=$request->validate([
    'name'=>'required',
    'email'=>'required',
    'password'=>'required',
 ]);
    $valid['password']=Hash::make($request->password);
    User::create($valid);
    flashy()->success('Account has been created');
    return redirect()->route('index');
    }

    function login(Request $request){
        // return $request;
        $valid=$request->validate([
            'email'=>'email|required',
            'password'=>'required',
        ]);
        if(Auth::attempt($valid)){
            flashy()->success('Login Successfuly...');
            return redirect()->route('dashboard');
        }
        return back()->with('error','Invalid email or Password');
}

function logout(){
    Auth::logout();
    return redirect()->route('login');
}
}
