<?php

namespace App\Http\Controllers;
use App\Models\customers;
use App\Models\listMissions;
use App\Models\listServices;
use App\Models\missions;
use App\Models\slides;
use App\Models\sections;
use App\Models\testimonials;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $slide = slides::where('active', 1)->get();
        $mission = missions::where('active',1)->get();
        $missionChildIds = $mission->pluck('id');
        $missionChildren = listMissions::whereIn('mission_id', $missionChildIds)->where('active',1)->get();
        $service = sections::where('active',1)->where('special',1)->get();
        $serviceChildIds = $service->pluck('id');
        $serviceChildren = listServices::whereIn('section_id', $serviceChildIds)->where('active',1)->take(4)->get();
        $testimo = sections::where('active',1)->where('id',3)->get();
        $testimoChildIds = $testimo->pluck('id');
        $testimoChildren = testimonials::whereIn('section_id', $testimoChildIds)->get();
        $customer = sections::where('active',1)->where('id',4)->get();
        $customerChildIds = $customer->pluck('id');
        $customerChildren = customers::whereIn('section_id', $customerChildIds)->get();
        $cate = sections::where('active',1)->where('id',5)->get();
        $cateChildIds = $cate->pluck('id');
        $cateChildren = customers::whereIn('section_id', $cateChildIds)->get();
        return view('home',compact('slide','mission','missionChildren','service','serviceChildren','testimo','testimoChildren','customer','customerChildren','cate','cateChildren'),[
            'title' => 'Trang chủ'
        ]);
    }
}
