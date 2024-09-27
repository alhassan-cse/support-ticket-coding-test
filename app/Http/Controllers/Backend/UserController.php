<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy("id", "DESC")->get();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(),[ 
                'user_type' => 'required',
                'name' => 'required|max:25',
                'phone' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:password'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = new User();
            $user->user_type = $request->user_type;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone; 
            if($request->avatar){
                $path = 'assets/uploads/user';
                $file_name = $request->avatar; 
                $file_full_name = rand(10, 99).'-'.strtolower(str_replace(" ", "-", $file_name->getClientOriginalName()));
                $file_name->move($path, $file_full_name);
                $full_path_name = $path.'/'.$file_full_name;
                $user->avatar = $full_path_name;
            }
            $user->password = Hash::make($request->password);
            $user->status = $request->status;
            if($user->save()){
                $notification = array(
                    'message' => 'User has been create successfully',
                    'alert-type' => 'success'
                ); 
                return redirect()->route('users.index')->with($notification);
            }
        } 
        //catch exception
        catch(Exception $e) {
            $notification = array(
                'message' => 'Something went wrong',
                'alert-type' => 'error'
            ); 
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find(decrypt($id));
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $validator = Validator::make($request->all(),[
                'user_type' => 'required',
                'name' => 'required', 'string', 'max:255',
                'email' => 'required', 'max:255',
                'phone' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = User::find($id); 
            if($request->avatar){
                $path = 'assets/uploads/user';
                $file_name = $request->avatar; 
                $file_full_name = rand(10, 99).'-'.strtolower(str_replace(" ", "-", $file_name->getClientOriginalName()));
                $file_name->move($path, $file_full_name);
                $full_path_name = $path.'/'.$file_full_name;
                $user->avatar = $full_path_name;
            }

            // if password updated
            if($request->password){
                if($request->password == $request->confirm_password){
                    $user->password = Hash::make($request->password);
                }
                else{
                    $notification = array(
                        'message' => 'Password don\'t match',
                        'alert-type' => 'error'
                    ); 
                    return redirect()->back()->with($notification);
                }
            }

            $user->user_type = $request->user_type;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->status = $request->status;
            if($user->save()){
                $notification = array(
                    'message' => 'User has been update successfully',
                    'alert-type' => 'success'
                ); 
                return redirect()->route('users.index')->with($notification);
            }
        } 
        //catch exception
        catch(Exception $e) {
            $notification = array(
                'message' => 'Something went wrong',
                'alert-type' => 'error'
            ); 
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function userActive(string $id)
    {
        try {
            $user = User::where('id', decrypt($id))->first();
            $user->status = 1 ; 
            if($user->save()){
                $notification = array(
                    'message' => 'User has been active successfully',
                    'alert-type' => 'success'
                ); 
                return redirect()->route('users.index')->with($notification);
            }
        } 
        //catch exception
        catch(Exception $e) {
            $notification = array(
                'message' => 'Something went wrong',
                'alert-type' => 'error'
            ); 
            return redirect()->back()->with($notification);
        } 
    }

    public function userInactive(string $id)
    {
        try {
            $user = User::where('id', decrypt($id))->first();
            $user->status = 0 ;
            if($user->save()){
                $notification = array(
                    'message' => 'User has been inactive successfully',
                    'alert-type' => 'success'
                ); 
                return redirect()->route('users.index')->with($notification);
            }
        } 
        //catch exception
        catch(Exception $e) {
            $notification = array(
                'message' => 'Something went wrong',
                'alert-type' => 'error'
            ); 
            return redirect()->back()->with($notification);
        } 
    }

    public function removeUser(Request $request)
    {
        $user = User::where('id', $request->id)->delete();
        if($user){
            return response()->json([
                'success' => 1
            ]);
        }
        else{
            return response()->json([
                'error' => 0
            ]); 
        }
    }
}