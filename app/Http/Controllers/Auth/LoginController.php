<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('auth')->only('logout');
    // }


    public function userLogin()
    {
        if (Auth::check() && Auth::user()->user_type == 2){
            return redirect()->route('home'); 
        } 
        return view('auth.login');
    }

    public function loginPost(Request $request){

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
            return redirect()->route('home')->with($notification); 
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
            return ['phone'=>$data['email'],'password'=>$data['password'], 'user_type'=>2, 'status'=>1];
        }
        elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) { 
            return ['email' => $data['email'], 'password'=>$data['password'], 'user_type'=>2, 'status'=>1];
        }
        return ['username' => $data['email'], 'password'=>$data['password'], 'user_type'=>2, 'status'=>1];
    }

}
