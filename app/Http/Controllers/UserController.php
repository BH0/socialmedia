<?php 

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

	public function getDashboard(Request $reuqest) { 
		return view('dashboard'); 
	}
	
	public function postSignup(Request $request) { 
	
		$this->validate($request, [
			'email' => 'required|email|unique:users', 
			'password' => 'required|min:8|max:32'
		]); 
	
		$email = $request['email'];
		$password = bcrypt($request['password']);
		
        $user = new User();
		
        $user->email = $email;
        $user->password = $password;
        $user->save();	 
		
		Auth::login($user); 

		return redirect()->route('dashboard'); 
	}

	public function postSignin(Request $request) { 

		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password' ]])) { 
			return redirect()->route('dashboard'); 
		} 
		return redirect()->back(); 
	} 
}

/* 
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller { 
	
	public function dashboard(Request $reuqest) { 
		return view('dashboard'); 
	}

	public function postSignup(Request $request) { 
	
        $email = $request['email'];
        $password = bcrypt($request['password']);

        $user = new User();

        $user->email = $email;
        $user->password = $password;
        $user->save();

        return redirect()->route('dashboard'); 

	}

	public function postSignIn(Request $request) { 
	
	} 

} 
*/ 