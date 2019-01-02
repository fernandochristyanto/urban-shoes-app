<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;

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


    public function register(){
        return view('register');
    }

    public function doRegister(Request $request){
        $rules = [
            'email' => 'required|email|unique:users,email',// ok
            'password' => 'required|min:6|confirmed',
            'name' => 'required'
        ]; 

        $messages = array(
            'email' => 'Email must be filled and unique',
            'password' => 'Password cannot be empty',
            'name' => 'Name is required'
        );
        
        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()) //Login fails (validation error)
        {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validation);
        } 
        else{
            $new_user = new User();
            $new_user->email = $request->email;
            $new_user->name = $request->name;
            $new_user->password = $request->password;
            $new_user->role = 'member';
            $new_user->created_at = Carbon::now();
            $new_user->save();
            Auth::login($new_user);
            return redirect()->route('home');
        }
    }
}
