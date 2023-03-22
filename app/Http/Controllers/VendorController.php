<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Vendor;
use App\Models\Slider;
use App\Models\Kategori;

class VendorController extends Controller
{
    
    function __construct(){
        $this->middleware('auth:vendor')->except(['login', 'doLogin','register','doRegister']);
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
        'like'=> 1
    );

    $vendor = Vendor::where('username', $request->username)->first();

    if(!$vendor){
        return redirect('/vendor/login')->with(['status' => 1 , 'msg' => 'Akun tidak dapat ditemukan']);
    }

    if($vendor->like == 0){
        return redirect('/vendor/login')->with(['status' => 1 , 'msg' => 'Akun Anda belum dikonfirmasi']);
    }

    if (Auth::guard('vendor')->attempt($cred)) {
        return redirect('/vendor/login')->with(['status' => 1 , 'msg' => 'Berhasil Login']);
    }else{
        return redirect('/vendor/login')->with(['status' => 1 , 'msg' => 'Gagal Login']);
    }
}


    function register(){
        return view('vendor.register');
    }
    function doRegister(Request $request){
        //auth vendor
        $data = array(
            'nama_vendor' => $request->nama_vendor,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'like' => $request->like,
        );
        $cek = DB::table('vendor')->where(['username' => $request->username])->count();
        if($cek > 2){
            return redirect("/vendor/register")->withError('Username Sudah Terdaftar');
        }
        $user = DB::table('vendor')->insert($data);
        return redirect("/vendor/login")->withSuccess('Berhasil Daftar');
    }
     
    function logout(){
        Auth::logout();
        return redirect('/vendor');
    }
    //end login logout

    function index(){
        return view('vendor.menu.dashboard');
    }
    function detail(){
        $data['vendor'] = Vendor::find(Auth::guard('vendor')->user()->id);
        $data['slider'] = Slider::where('id_vendor', Auth::guard('vendor')->user()->id)->get();
        $data['kategori'] = Kategori::get();
        return view('vendor.menu.detail',$data);
    }
    function ubahDetail(Request $request){
        $vendor = Vendor::find(Auth::guard('vendor')->user()->id);
        $file = $request->file('foto');
        if($file){
            //upload file foto jpg
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg|max:1048',
            ]);
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'foto_vendor';
            if($file->move($tujuan_upload,$nama_file)){
                $old_file = $vendor->foto;
                $vendor->foto  = $nama_file;
                if($old_file && file_exists($tujuan_upload.'/'.$old_file)){
                    unlink($tujuan_upload.'/'.$old_file);
                }
            }
        }


        $vendor->nama_vendor = $request->nama;
        $vendor->alamat = $request->alamat;
        $vendor->harga = $request->harga;
        $vendor->paket = $request->deskripsi;
        $vendor->asal = $request->asal;
        $vendor->id_kategori = $request->id_kategori;
        $vendor->facebook = $request->facebook;
        $vendor->no_telp = $request->no_telp;
        $vendor->instagram = $request->instagram;
        $vendor->save();
        return redirect('/vendor/detail')->with(['status' => 1 , 'msg' => 'Berhasil Ubah Detail']);
    }
    function uploadSlider(Request $request){
        $file = $request->file('slider');
        $slider_count = Slider::where('id_vendor', Auth::guard('vendor')->user()->id)->count();
        $vendor = Vendor::find(Auth::guard('vendor')->user()->id);
        if($vendor->jenis_vendor == 1 && $slider_count == 4){ //jika vendor free
            return redirect('/vendor/detail')->with(['status' => 2 , 'msg' => 'Slider Maksimal 4']);
        }else if($vendor->jenis_vendor == 2 && $slider_count == 8){//jika vendor premium
            return redirect('/vendor/detail')->with(['status' => 2 , 'msg' => 'Slider Maksimal 8']);
        }
    
        if($file){
            //upload file foto jpg
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg|max:1048',
            ]);
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'foto_vendor/slider';
            if($file->move($tujuan_upload,$nama_file)){
                $slider = new Slider;
                $slider->id_vendor = Auth::guard('vendor')->user()->id;
                $slider->slider = $nama_file;
                $slider->save();
            }
        }
        return redirect('/vendor/detail')->with(['status' => 1 , 'msg' => 'Berhasil Upload Slider']);
    }
    function hapusSlider(Request $req){
        $slider = Slider::find(['id' => $req->id,'id_vendor' => Auth::guard('vendor')->user()->id]);
        if($slider){
            echo "asd";
            unlink('foto_vendor/slider/'.$slider->first()->slider);
            Slider::where(['id' => $req->id,'id_vendor' => Auth::guard('vendor')->user()->id])->delete();            
            return redirect('/vendor/detail')->with(['status' => 1 , 'msg' => 'Berhasil Hapus Slider']);
        }else{
            return redirect('/vendor/detail')->with(['status' => 2 , 'msg' => 'Gagal Hapus Slider']);
        }
    }

    function ubahPassword(){
        return view('vendor.menu.ubah_password');
    }
    function doUbahPassword(Request $request){
        $vendor = Vendor::find(Auth::guard('vendor')->user()->id);
        if (!Hash::check($request->old_password, $vendor->password)) {
            return redirect('/vendor/ubah-password')->with(['status' => 2 , 'msg' => 'Password Lama Salah'])->withInput();
        }

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ],
        [
            'required' => ':attribute tidak boleh kosong',
            'same' => ':attribute tidak sama dengan password',
        ]);
        if ($validator->fails()) {
            return redirect('/vendor/ubah-password')
                        ->withErrors($validator)
                        ->withInput();
        }
        $vendor->password = Hash::make($request->password);
        $vendor->save();
        return redirect('/vendor/ubah-password')->with(['status' => 1 , 'msg' => 'Berhasil Ubah Password']);
    }
}
