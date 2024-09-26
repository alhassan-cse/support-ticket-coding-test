<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminController extends Controller
{
    public function adminLoign()
    {
        if (Auth::check() && Auth::user()->user_type == 1){
            return redirect()->route('dashboard'); 
        } 
        return view('backend.login');
    }

    public function adminpostLoign(Request $request)
    {
        $v = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);
        $email_or_phone = $request->get("email");
        $password = $request->get("password");
        
        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        $data = $this->login_check($request->all());

        if(Auth::attempt($data))
        { 
            $notification = array(
                'message' => 'Login Successfully',
                'alert-type' => 'success'
            ); 
            return redirect()->route('dashboard')->with($notification); 
        }
        else{
            $notification = array(
                'message' => 'Your username or password wrong',
                'alert-type' => 'error'
            ); 
            return redirect()->back()->with($notification);
        }
    }

    public function login_check($data)
    {
        //dd($data['email']);
        if(is_numeric($data['email'])){
            return ['phone'=>$data['email'],'password'=>$data['password'], 'status'=>1];
        }
        elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) { 
            return ['email' => $data['email'], 'password'=>$data['password'], 'status'=>1];
        }
        return ['username' => $data['email'], 'password'=>$data['password'], 'status'=>1];
    }

    public function adminLogout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Logout succuessfully',
            'alert-type' => 'success'
        ); 
        return redirect()->route('admin.login')->with($notification); 
    }
}
