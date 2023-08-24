<?php

namespace App\Http\Controllers;
use App\Models\listMissions;
use App\Models\listServices;
use App\Models\missions;
use App\Models\slides;
use App\Models\services;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $slide = slides::where('active', 1)->get();
        $mission = missions::where('active',1)->get();
        $missionChildIds = $mission->pluck('id');
        $missionChildren = listMissions::whereIn('mission_id', $missionChildIds)->where('active',1)->get();
        $service = services::where('active',1)->where('special',1)->get();
        $serviceChildIds = $service->pluck('id');
        $serviceChildren = listServices::whereIn('service_id', $serviceChildIds)->where('active',1)->take(4)->get();
        return view('home',compact('slide','mission','missionChildren','service','serviceChildren'),[
            'title' => 'Trang chủ'
        ]);
    }
}
