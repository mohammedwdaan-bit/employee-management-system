<?php

namespace App\Http\Controllers\web_S;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function index(){
        return view('web_S.usera');
    }

      public function index2(){
        return view('Dashboard.dashboard_manger');
    }
}
