<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function authentication(){
        $_SESSION['login_error']=false;
        return view('auth.login');
    }

    public function register(){
        $dl = new DataLayer();
        $uni = $dl->listUniversities();
        return view('auth.register')->with('uniList', $uni);
    }

    public function login(Request $request){
        session_start();
        $dl = new DataLayer();
        if($dl->validateUser($request->input('username'),$request->input('password'))){
            $_SESSION['logged'] = true;
            $_SESSION['loggedName'] = $request->input('username');
            return Redirect::to('/');
        } else {
            return view('auth/login');
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        return Redirect::to('/');
    }

    public function registration(Request $request){
        $dl = new DataLayer();

        $dl->addUser($request->input('username'),$request->input('full_name'),$request->input('email'),$request->input('password'),$request->input('uni_id'),$request->input('major'),$request->input('role'));

        return Redirect::to('/');
    }

    public function ajaxRegister(Request $request){
        $dl = new DataLayer();
        $username = $request->input('username');
        $foundUsername = $dl->usernameExists($username);
        if ($foundUsername){
            $response = array('found' => true); // username found
        } else {
            $response = array('found' => false); // username not found
        }
        return response()->json($response);
    }

    public function ajaxLogin(Request $request){
        session_start();
        $dl = new DataLayer();
        if($dl->validateUser($request->input('username'),$request->input('password'))){
            $_SESSION['logged'] = true;
            $_SESSION['loggedName'] = $request->input('username');
            $response = array('logged' => true);
        } else {
            $response = array('logged' => false);
        }
        return response()->json($response);
    }
}
