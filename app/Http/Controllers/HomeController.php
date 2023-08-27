<?php

namespace App\Http\Controllers;
use App\Models\cates;
use App\Models\customers;
use App\Models\listMissions;
use App\Models\listServices;
use App\Models\missions;
use App\Models\posts;
use App\Models\settings;
use App\Models\slides;
use App\Models\sections;
use App\Models\OptionPosts;
use App\Models\testimonials;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
//        Slider
        $slide = slides::where('active', 1)->get();
//        Sứ mệnh
        $mission = missions::where('active',1)->get();
        $imagesToDisplay = [];
        foreach ($mission as $missionchild) {
            $images = json_decode($missionchild->image);
            $imagesToDisplay = is_array($images) ? array_slice($images, 0, 3) : [];
        }
        $missionChildIds = $mission->pluck('id');
        $missionChildren = listMissions::whereIn('mission_id', $missionChildIds)->where('active',1)->get();

//        Dịch vụ
        $service = sections::where('active',1)->where('special',1)->get();
        $serviceChildIds = $service->pluck('id');
        $serviceChildren = listServices::whereIn('section_id', $serviceChildIds)->where('active',1)->take(4)->get();
//        Cảm nhận khách hàng
        $testimo = sections::where('active',1)->where('id',3)->get();
        $testimoChildIds = $testimo->pluck('id');
        $testimoChildren = testimonials::whereIn('section_id', $testimoChildIds)->get();
//        Đối tác
        $customer = sections::where('active',1)->where('id',4)->get();
        $customerChildIds = $customer->pluck('id');
        $customerChildren = customers::whereIn('section_id', $customerChildIds)->get();
//        Section
        $cate = sections::where('active',1)->where('id',5)->get();
        $cateChildIds = $cate->pluck('id');
        $cateChildren = customers::whereIn('section_id', $cateChildIds)->get();

//        Danh mục và bài viết
        $catePost = cates::where('active',1)->get();
        $tinNoiBoPosts = [];
        $tinNganhPosts = [];

        foreach ($catePost as $cateItem) {
            if ($cateItem->alias == 'tin-noi-bo') {
                $tinNoiBoPosts = posts::where('cate_id', $cateItem->id)
                    ->where('active', 1)
                    ->orderBy('created_at', 'desc')
                    ->take(1)
                    ->get();
            }

            if ($cateItem->alias == 'tin-nganh') {
                $tinNganhPosts = posts::where('cate_id', $cateItem->id)
                    ->where('active', 1)
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();
            }
        }
        return view('home',compact('slide','mission','imagesToDisplay','missionChildren','service','serviceChildren','testimo','testimoChildren','customer','customerChildren','cate','cateChildren','catePost','tinNganhPosts','tinNoiBoPosts'),[
            'title' => 'Trang chủ'
        ]);
    }

}
