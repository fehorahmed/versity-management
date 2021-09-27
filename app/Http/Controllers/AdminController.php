<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function index()
    {   
        if(session()->has('Admin_login')){
            return redirect()->route('dashboard.index');
        }else{
            return view('admin.login.admin_login');
        }
        
    }

    
    public function auth(Request $request)
    {  
        $request->validate([
            'email'=>'required|email:rfc,dns',
            'password'=>'required'
        ]);
        $email= $request->post('email');
        $password= $request->post('password');

        $result=Admin::select('*')
                       ->where('email','=',$email)
                       ->first();
        if($result){
            if(Hash::check($password,$result->password)){
                $request->session()->put("Admin_login",true);
                $request->session()->put("Admin_name",$result->name);
                $request->session()->put("Admin_email",$result->email);
                $request->session()->put("Admin_phone",$result->phone);
                $request->session()->put("Admin_address",$result->address);
                return redirect('/dashboard');
            }else{
                Session::flash('message','Incorrect password!');
                return redirect()->route('admin.index');
            }
        }else{
            Session::flash('message','Email not register yet !');
            return redirect()->route('admin.index');
        }         
    }


    public function logout(){
        session()->forget('Admin_login');
        session()->forget('Admin_name');
        session()->forget('Admin_email');
        session()->forget('Admin_phone');
        session()->forget('Admin_address');
        return redirect()->route('admin.index');
    }

    public function show(){
        return view('admin.admin_profile');
    }

   
}
