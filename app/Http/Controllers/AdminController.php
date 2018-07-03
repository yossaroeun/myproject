<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
class AdminController extends Controller
{
	public function login(Request $request){
		if($request->isMethod('post')){
			if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
				//Session::put('adminSession',$request->email);

				return redirect()->intended('/admin/dashboard');
			}
			else{
				return redirect()->intended('/admin/login')->with('flash_message_error','Invalid email or password!');
			}
		}
		return view('admin.admin_login');
	}

	public function dashboard(){
  	    // declare to protected Auth when login use php
  	   /* if(Session::has('adminSession')){

  	    }else{
  	    	return redirect()->intended('/admin/login')->with('flash_message_error','Please log in to access !');
  	    }*/
  	    return view('admin.dashboard');
  	}
  	public function setings(){
  		return view('admin.setings');
  	}
  	public function chkPassword(Request $request){
  		$data = $request->all();
  		$current_password = $data['current_pwd'];
  		$check_password = User::where(['admin'=>'1'])->first();
  		if(Hash::check($current_password,$check_password->password)){
  			echo("true");die;
  		}else{
  			echo("false");die;
  		}

  	}
  	public function updatePassword(Request $request){
  		if($request->isMethod('post')){
        $request->validate([
              'current_pwd'=>'required|min:6',
              'new_pwd' =>'required|min:6',
              'confirm_pwd'=>'required|min:6',
        ]);
  			$data = $request->all();
			//echo "<pre>";print_r($data);die;
			$current_password = $data['current_pwd'];
  			$check_password =  User::where(['email'=>Auth::user()->email])->first();
  			if(Hash::check($current_password,$check_password->password)){
  				$password=bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect()->intended('/admin/setings')->with('flash_message_success','Password update successfully!');
  			}else{
  				return redirect()->intended('/admin/setings')->with('flash_message_error','Incorrect current Password!');
  			}
  		}
  	}
  	public function logout(){
  		Session::flush();
  		return redirect()->intended('/admin/login')->with('flash_message_success','Logged out successfully !');
  	}
    public function create(){
      return view('admin.user_create');
    }
    public function store(Request $request){
          //if($request->isMethod('post')){}
          $data = new user;
          $data->name=$request->get('name');
          $data->email=$request->get('email');
          $data->password=bcrypt($request->get('password'));
          $data->save();
          return redirect('admin/user_create')->with('flash_message_success','Information has been added');
        
    }
  }
