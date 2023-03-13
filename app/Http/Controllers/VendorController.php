<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    //
    function __construct(){
        // $this->middleware('auth:vendor')->except(['login', 'doLogin']);
    }

    function index(){
        return view('vendor.layout');
    }
}
