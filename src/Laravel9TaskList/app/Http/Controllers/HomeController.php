<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     *  ホームページを表示するコントローラー
     *  
     *  GET /
     *  @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

}
