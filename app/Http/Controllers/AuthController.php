<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Session;
use Hash;

class AuthController extends Controller
{
    //

    public function getLogin() {

    	return view('login');
    }

    public function postLogin(Request $request) {
    	//dd('Login Oke');
    	// if (!\Auth::attempt(['email' => $request->email, 'password' => $request->password]))	{
    	// 	return redirect()->back();
    	// }

    	// return redirect()->route('admin_page');

    		$email 		= $request->email;
    		$password 	= $request->password;

   //  		$email 		= Request::get('email');
			// $password 	= Request::get('password');
			
			if($email && $password) {
				$users = User::whereRaw("email = '$email'")->first();
				if(!$users){
					return redirect()->back()->with('message', 'Gagal login email atau password salah !');
				    // return redirect('/')->with('message', 'Gagal login email atau password salah !');
				 }
				if(!Hash::check($password,$users->password)) 
				{	
					return redirect()->back()->with('message', 'Gagal login email atau password salah !');
					// return redirect('/')->with('message', 'Gagal login email atau password salah !');
				}else{
					!auth()->attempt(['email' => $request->email, 'password' => $request->password]);
					Session::put('admin_id',$users->id);
					Session::put('name',$users->name);
					Session::put('email',$users->email);
					Session::put('akses',$users->akses);
					// Session::put('username',$users->username);
					// return redirect('index');
					return redirect()->route('admin_page');
				}
			}else{
				// return redirect('/')->with('message', 'Anda belum mengisi email dan password dengan benar !');
				return redirect()->back()->with('message', 'Anda belum mengisi email dan password dengan benar !');
			}
		
    }

    public function postRegister(Request $request) {

    	$this->validate($request, [
    		'username' => 'required|min:4',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required|min:6|confirmed'
    	]);

    	User::create([
    		'name' => $request->username,
    		'password' => bcrypt($request->password),
    		'email' => $request->email,
    		'akses' => 0
    	]);

    	return redirect()->back()->with('registration', 'Registration Success!');;
    }

    public function logout() {
    	auth()->logout();

    	return redirect()->route('login');
    }
}
