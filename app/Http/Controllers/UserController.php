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
    public function kategori($id)
    {
    $kategori = DB::table('kategori')->where('id', $id)->first();
    return view('kategori', compact('kategori'));
    }
    public function search(){
        $cari = addslashes($_GET['cari']);
        $vendor = DB::table('vendor')->where('nama_vendor', 'like', "%".$cari."%")->get();
        return view('search', compact('vendor'));
    }


    function login(){
        return view('login');
    }
    function porto($id){
        $kategori = DB::table('vendor')->where('id', $id)->first();
        return view('porto');
    }
    function detail($id){
        $vendor = DB::table('vendor')->where('id', $id)->first();
        return view('detail', compact('vendor'));
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
