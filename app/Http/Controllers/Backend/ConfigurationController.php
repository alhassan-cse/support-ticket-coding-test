<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function configuration()
    {
        return view('backend.setting.configuration');
    }

    public function appUpdate(Request $request)
    {
        try {
             
            foreach ($request->types as $key  =>  $type) {
                $this->overWriteEnvFile($type, $request[$type]);
            }
            // Artisan::call("config:clear");
            $notification = array(
                'message' => 'App has been update successfully',
                'alert-type' => 'success'
            ); 
            return redirect()->back()->with($notification);
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

    public function SMTPUpdate(Request $request)
    {
        try {
            
            foreach ($request->types as $key  =>  $type) {
                $this->overWriteEnvFile($type, $request[$type]);
            }
            // Artisan::call("config:clear");
            $notification = array(
                'message' => 'SMTP has been update successfully',
                'alert-type' => 'success'
            ); 
            return redirect()->back()->with($notification);
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

    public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
            }
        }
    }
}
