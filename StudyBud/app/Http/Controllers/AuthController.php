<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function authentication(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function login(Request $request){
        session_start();
        $dl = new DataLayer();

        if($dl->validateUser($request->input('username'),$request->input('password'))){
            $_SESSION['logged'] = true;
            $_SESSION['loggedName'] = $request->input('username');
            return Redirect::to('/');
        } else {
            return "Error";
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        return Redirect::to('/');
    }

    public function registration(Request $request){
        $dl = new DataLayer();

        $dl->addUser($request->input('username'),$request->input('full_name'),$request->input('email'),$request->input('password'),$request->input('university'),$request->input('major'),$request->input('role'));

        return Redirect::to('user/login');
    }
}
