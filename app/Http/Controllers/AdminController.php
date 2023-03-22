<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Vendor;

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
            return redirect('/admin/kategori')->with(['status' => 2 , 'msg' => 'Gagal Menambahkan Kategori']);
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
            return redirect('/admin/kategori')->with(['status' => 2 , 'msg' => 'Gagal Mengubah Kategori']);
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
            return redirect('/admin/kategori')->with(['status' => 2 , 'msg' => 'Gagal Menghapus Kategori']);
        }
    }

    function vendor(){
        $data['vendor'] = DB::table('vendor')->select(
            'vendor.*', 'kategori.nama_kategori'
        )->where(['vendor.hapus' => 0])->join(
            'kategori', 'kategori.id', '=', 'vendor.id_kategori'
        )->get();
        $data['kategori'] = DB::table('kategori')->where(['hapus' => 0])->get();
        return view('admin.menu.vendor', $data);
    }

    function vendorInsert(Request $request){
        $username = $request->username;
        $password = Hash::make($request->password);
        $nama_vendor = $request->nama_vendor;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
        $foto = $request->foto;
        $paket = $request->paket;
        $id_kategori = $request->id_kategori;
        $harga = $request->harga;
        $asal = $request->asal;
        $facebook = $request->facebook;
        $instagram = $request->instagram;

        $cekUsername = DB::table('vendor')->where(['username' => $username])->first();
        if($cekUsername){
            return redirect('/admin/vendor')->with(['status' => 2 , 'msg' => 'Username Sudah Digunakan']);
        }


        //upload file foto jpg
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'foto_vendor';
        if($file->move($tujuan_upload,$nama_file)){
            $foto = $nama_file;
        }else{
            return redirect('/admin/vendor')->with(['status' => 2 , 'msg' => 'Pastikan Inputan Sesuai']);
        }


        $insert = DB::table('vendor')->insert([
            'username' => $username,
            'password' => $password,
            'harga' => $harga,
            'asal' => $asal,
            'nama_vendor' => $nama_vendor,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'jenis_vendor' => $request->jenis_vendor,
            'foto' => $foto,
            'paket' => $paket,
            'id_kategori' => $id_kategori,
            'hapus' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($insert) {
            return redirect('/admin/vendor')->with(['status' => 1 , 'msg' => 'Berhasil Menambahkan Vendor']);
        }else{
            return redirect('/admin/vendor')->with(['status' => 2 , 'msg' => 'Gagal Menambahkan Vendor']);
        }
    }
    function vendorDetail($id){

        $data = DB::table('vendor')->where(['id' => $id])->first();
        echo json_encode($data);
    }
    function vendorEdit(Request $request){
        $id = $request->id;
        $data_update = [
            'nama_vendor' => $request->nama_vendor,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'paket' => $request->paket,
            'id_kategori' => $request->id_kategori,
            'like' => $request->status,
            'asal' => $request->asal,
            'harga' => $request->harga,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'jenis_vendor' => $request->jenis_vendor,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        //upload file foto jpg
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'foto_vendor';
            if($file->move($tujuan_upload,$nama_file)){
                $data_update['foto'] = $nama_file;
            }
            //end upload file
        }

        $update = DB::table('vendor')->where(['id' => $id])->update($data_update);
        if ($update) {
            return redirect('/admin/vendor')->with(['status' => 1 , 'msg' => 'Berhasil Mengubah Vendor']);
        }else{
            return redirect('/admin/vendor')->with(['status' => 2 , 'msg' => 'Gagal Mengubah Vendor']);
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
            return redirect('/admin/vendor')->with(['status' => 2 , 'msg' => 'Gagal Menghapus Vendor']);
        }
    }

    function pesanan(){
        $pesanan = DB::table('pesanan')->select(
            'pesanan.*', 'vendor.nama_vendor', 'users.name'
        )->join(
            'vendor', 'vendor.id', '=', 'pesanan.id_vendor'
        )->join(
            'users', 'users.id', '=', 'pesanan.id_user'
        )->get();
        return view('admin.menu.pesanan', ['pesanan' => $pesanan]);
    }

    function profile(){
        $data['user'] = DB::table('admin')->first();
        return view('admin.menu.user_profile', $data);
    }
    function profileEdit(Request $request){
        $data_update = [
            'name' => $request->nama,
        ];
        if ($request->password != '') {
            $data_update['password'] = Hash::make($request->password);
        }
        $update = DB::table('admin')->where(['id' => 1])->update($data_update);
        if ($update) {
            return redirect('/admin/profile')->with(['status' => 1 , 'msg' => 'Berhasil Mengubah Profile']);
        }else{
            return redirect('/admin/profile')->with(['status' => 2 , 'msg' => 'Gagal Mengubah Profile']);
        }
    }

    function user(){
        $data['user'] = DB::table('users')->get();
        return view('admin.menu.user', $data);
    }

}
