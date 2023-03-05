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
        $data['kategori'] = DB::table('kategori')->where(['hapus' => 0])->get();
        return view('admin.menu.kategori', $data);
    }
    function kategoriInsert(Request $request){
        $nama_kategori = $request->nama_kategori;
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
    function kategoriDetail($id){

        $data = DB::table('kategori')->where(['id' => $id])->first();
        echo json_encode($data);
    }
    function kategoriEdit(Request $request){
        $id = $request->id;
        $nama_kategori = $request->nama_kategori;
        $update = DB::table('kategori')->where(['id' => $id])->update([
            'nama_kategori' => $nama_kategori,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($update) {
            return redirect('/admin/kategori')->with(['status' => 1 , 'msg' => 'Berhasil Mengubah Kategori']);
        }else{
            return redirect('/admin/kategori')->with(['status' => 0 , 'msg' => 'Gagal Mengubah Kategori']);
        }
    }
    function kategoriHapus(Request $request){
        $id = $request->id;
        $update = DB::table('kategori')->where(['id' => $id])->update([
            'hapus' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($update) {
            return redirect('/admin/kategori')->with(['status' => 1 , 'msg' => 'Berhasil Menghapus Kategori']);
        }else{
            return redirect('/admin/kategori')->with(['status' => 0 , 'msg' => 'Gagal Menghapus Kategori']);
        }
    }

    function vendor(){
        $data['vendor'] = DB::table('vendor')->where(['hapus' => 0])->get();
        return view('admin.menu.vendor', $data);
    }

    function vendorInsert(Request $request){
        $nama_vendor = $request->nama_vendor;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
        $foto = $request->foto;
        $paket = $request->paket;

        $insert = DB::table('vendor')->insert([
            'nama_vendor' => $nama_vendor,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'foto' => $foto,
            'paket' => $paket,
            'hapus' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($insert) {
            return redirect('/admin/vendor')->with(['status' => 1 , 'msg' => 'Berhasil Menambahkan Vendor']);
        }else{
            return redirect('/admin/vendor')->with(['status' => 0 , 'msg' => 'Gagal Menambahkan Vendor']);
        }
    }
    function vendorDetail($id){

        $data = DB::table('vendor')->where(['id' => $id])->first();
        echo json_encode($data);
    }
    function vendorEdit(Request $request){
        $id = $request->id;
        $nama_vendor = $request->nama_vendor;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
        $foto = $request->foto;
        $paket = $request->paket;

        $update = DB::table('vendor')->where(['id' => $id])->update([
            'nama_vendor' => $nama_vendor,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'foto' => $foto,
            'paket' => $paket,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($update) {
            return redirect('/admin/vendor')->with(['status' => 1 , 'msg' => 'Berhasil Mengubah Vendor']);
        }else{
            return redirect('/admin/vendor')->with(['status' => 0 , 'msg' => 'Gagal Mengubah Vendor']);
        }
    }
    function vendorHapus(Request $request){
        $id = $request->id;
        $update = DB::table('vendor')->where(['id' => $id])->update([
            'hapus' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($update) {
            return redirect('/admin/vendor')->with(['status' => 1 , 'msg' => 'Berhasil Menghapus Vendor']);
        }else{
            return redirect('/admin/vendor')->with(['status' => 0 , 'msg' => 'Gagal Menghapus Vendor']);
        }
    }

    function pesanan(){
        $pesanan = DB::table('pesanan')->get();
        return view('admin.menu.pesanan', ['pesanan' => $pesanan]);
    }

}
