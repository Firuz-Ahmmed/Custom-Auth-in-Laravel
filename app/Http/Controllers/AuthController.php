<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect('home');
       
        }
        return view('login');
    }
    function registration(){
        if (Auth::check()){
            return redirect('home');
       
        }
        return view('registration');
    }
    function loginPost(Request $request)
    {
       $request->validate([
        'email'=>'required',
        'password'=>'required'
       ]);
       
       $creadentials=$request->only('email','password');
       //dd($creadentials);
       if(Auth::attempt($creadentials)){
        //dd($request->all());
        return redirect()->intended('home');
       }
       else{
       return redirect('login')->with('error1','Login Unsuccessfull');
       }
    }
    function registrationPost(Request $request)
    {
        
        $request->validate([
            'fullname' => 'required', 
            'email' => 'required|email|unique:users',  
            'password' => 'required'
        ]);
        
      // dd($request->all());
       $data['fullname']=$request->fullname;
       $data['email']=$request->email;
       $data['password']=Hash::make($request->password);
       
       $user=User::create($data);
       if(!$user){
        return redirect(route('registration'))->with('errors','Registration Unsuccessfull');
    
       }
       else{
       return redirect(route('login'))->with('success','Registration Successfull');}
    
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));

    }
}
