<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    //
    function __construct(){
        $this->middleware('auth:vendor')->except(['login', 'doLogin']);
    }
    //login logout
    function login(){
        return view('vendor.login');
    }
    function doLogin(Request $request){
        //auth vendor

        $cred = array(
            'username' => $request->username,
            'password' => $request->password,
        );
        if (Auth::guard('vendor')->attempt($cred)) {
            return redirect('/vendor/login')->with(['status' => 1 , 'msg' => 'Berhasil Login']);
        }else{
            return redirect('/vendor/login')->with(['status' => 1 , 'msg' => 'Gagal Login']);
        }
    }
    function logout(){
        Auth::logout();
        return redirect('/vendor');
    }
    //end login logout
    function index(){
        return view('vendor.layout');
    }
}
