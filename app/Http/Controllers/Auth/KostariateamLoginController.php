<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class KostariateamLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:kostariateam', ['except' => ['logout']]);
	}


    public function showLoginForm(){
    	return view('auth.kostariateam-login');
    }

    public function login(Request $request){
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	if (Auth::guard('kostariateam')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		return redirect()->intended(route('kostariateam.dashboard'));    		
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout(){
        Auth::guard('kostariateam')->logout();
        return redirect('/');
    }
}
