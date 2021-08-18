<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.components.layout');
    }
    public function hello()
    {
        return "hello";
    }
}
