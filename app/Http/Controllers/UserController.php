<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function index(){
        return view('welcome');
    }
    function login(){
        return view('login');
    }
    function doLogin(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            return redirect('/')->withSuccess('success', 'You have successfully logged in');
        }
        return redirect("login")->withError('Salah Email atau Password');
    }
    function register(){
        return view('register');
    }
    function doRegister(Request $request){
        $data = array(
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        );
        $cek = DB::table('users')->where(['email' => $request->email])->count();
        if($cek > 0){
            return redirect("register")->withError('Email Sudah Terdaftar');
        }
        $user = DB::table('users')->insert($data);
        return redirect("register")->withSuccess('Berhasil Daftar');
    }
    function logout(){
        Auth::guard('user')->logout();
        return redirect('');
    }
    
}
