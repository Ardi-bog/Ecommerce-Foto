<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function __construct(){
        $this->middleware('auth:admin')->except(['login', 'doLogin']);
    }
    //login logout
    function login(){
        return view('admin.login');
    }
    function doLogin(Request $request){
        //auth admin

        $cred = array(
            'username' => $request->username,
            'password' => $request->password,
        );
        if (Auth::guard('admin')->attempt($cred)) {
            return redirect('/admin/login')->with(['status' => 1 , 'msg' => 'Berhasil Login']);
        }else{
            return redirect('/admin/login')->with(['status' => 1 , 'msg' => 'Gagal Login']);
        }
    }
    function logout(){
        Auth::logout();
        return redirect('/admin');
    }
    //end login logout

    function index(){
        return view('admin.menu.dashboard');
    }

    function kategori(){
        $kategori = DB::table('kategori')->where(['hapus' => 0])->get();
        return view('admin.menu.kategori', ['kategori' => $kategori]);
    }
    function kategoriInsert(){
        $nama_kategori = request()->nama_kategori;
        $insert = DB::table('kategori')->insert([
            'nama_kategori' => $nama_kategori,
            'hapus' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($insert) {
            return redirect('/admin/kategori')->with(['status' => 1 , 'msg' => 'Berhasil Menambahkan Kategori']);
        }else{
            return redirect('/admin/kategori')->with(['status' => 0 , 'msg' => 'Gagal Menambahkan Kategori']);
        }
    }

    function vendor(){
        $vendor = DB::table('vendor')->get();
        return view('admin.menu.vendor', ['vendor' => $vendor]);
    }

    function pesanan(){
        $pesanan = DB::table('pesanan')->get();
        return view('admin.menu.pesanan', ['pesanan' => $pesanan]);
    }

}
