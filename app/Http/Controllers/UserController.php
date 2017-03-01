<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{

	public function getAdd() {
		return view('admin.user.add');
	}

	public function postAdd(UserRequest $request) {
		$user = new User;
		$user->email = $request->txtEmail;
    	$user->username = $request->txtUserName;
    	$user->password = bcrypt($request->txtPass);
    	$user->level = 1;
    	$user->save();

    	return redirect('add/user')->with(["flash_level" => "success", "flash_message" => "Thêm thành công"]);

	}


    public function index() {
    	return view('admin.user.login');
    }

    public function getLogin(Request $request) {

    }	

    public function postLogin(Request $request) {
    	if(Auth::attempt(['username' => $request->txtUserName, 'password' => $request->txtPass])) {
    		return redirect('upload/keywords');
    	}else {
    		return redirect('login');
    	}
    }

    public function logout() {
    	Auth::logout();
    	return redirect('login');
    }
}
