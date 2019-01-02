<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    //
    public function doLogin(Request $request){
        $userFormData = $request->all();
        
        $rules = [
            'email' => 'required',
            'password' => 'required'    
        ]; 
        
        $validation = Validator::make($userFormData, $rules);

        $messages = array(
            "email" => "Email cannot be empty",
            "password" => "Password cannot be empty"
        );
        
        if($validation->fails()) //Login fails (validation error)
        {
            return redirect()
                ->back()
                ->withInput($request->only('Email'))
                ->withErrors($messages);
        }   

        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], false)){
            return redirect()->intended(route('home'));
        }

        $messages = array(
            "InvalidCredential"=>"Invalid Email / Password"
        );

        //Unsuccessful login
        return redirect()
                ->back()
                ->withInput($request->only('username'))
                ->withErrors($messages);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
