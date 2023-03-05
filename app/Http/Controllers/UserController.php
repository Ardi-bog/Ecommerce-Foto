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
        $data['kategori'] = DB::table('kategori')->where(['hapus' => 0])->get();
        return view('welcome',$data);
    }
    function login(){
        return view('login');
    }
    
}
