<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('website');
    }
    public function admin (){
        return view('admin.adminlogin');
    }
}
