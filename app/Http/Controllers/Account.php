<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use DB;

class Account extends Controller
{
    public function login(){
    	return view('admin.login');
    }

    public function authenticate(Request $request){

        if ($user = Admin::where($request->only('email'))->first()) {
	        if (Hash::check($request->input('password'), $user->password)) {
	           $request->session()->put('ADMIN_LOGIN',true);
	           $request->session()->put('ADMIN_ID',$user->id);
	           return redirect('admin');
	        }
        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('admin-login');
        }      
   
    }


    public function registration(){
    	return view('admin.register');
    }

    public function doRegister(Request $r){
         $this->validate($r, [
            'email' => "bail|required|unique:admins,email,$r->id",
            'user_name' => "required",
            'password' => "required | min:6"
         ]);

         Admin::create([
            'email' => $r->email,
            'name' => $r->name,
            'user_name' => $r->user_name,
            'password' => Hash::make($r->password),
        ]);

        
        $r->session()->flash('msg','success !');

        return redirect('admin-login');

    }

    public function getEmail(){
        return view('reset-password.index');
    }

    public function postEmail(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);

        DB::table('admins')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.password.verify',['token' => $token], function($message) use ($request) {
                  $message->from($request->email);
                  $message->to('Mailtrap Inbox <to@example.com>');
                  $message->subject('Reset Password Notification');
               });

        return back()->with('message', 'We have e-mailed your password reset link!');
 
    }
    
}
