<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function home(){
        return view ('admin.home',[
            'title' => 'Trang quản trị'
        ]);
    }
}
