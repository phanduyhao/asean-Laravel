<?php

namespace App\Http\Controllers;
use App\Models\slides;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $slide = slides::where('active', 1)->get();

        return view('home',compact('slide'),[
            'title' => 'Trang chủ'
        ]);
    }
}
