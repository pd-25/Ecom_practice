<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Adminlogins;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class Admincontroller extends Controller
{
    //
    public function login(Request $request){
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('dashboard');
           
        }else{
           // $request-> session()->flash('message', 'you are already logged in, hit dashboard');
           return view('admin.login');
        }
       // return view('admin.login');
    }

    public function auth(Request $request){
        $email = $request->post('email');
        $password = $request->post('password');

        $resp = Adminlogins::where(['email'=>$email])->first();
        if($resp){
            if(Hash::check($request->post('password'),$resp->password)){
                $request-> session()->put('ADMIN_LOGIN', true);
            $request-> session()->put('ADMIN_ID', $resp->id);
            return redirect('admin/dashboard');
            }else{
                $request-> session()->flash('message', 'invaillid id password');
                return redirect('admin/login');
            }
            

        }else{
            $request-> session()->flash('message', 'invaillid id ');
                return redirect('login');
           
        }

        
        
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

   


}
