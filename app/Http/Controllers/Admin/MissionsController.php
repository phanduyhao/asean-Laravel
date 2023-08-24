<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\missions;
use Illuminate\Support\Str;

class missionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $missions = missions::all();
        return view('admin.mission.index',compact('missions'),[
            'title' => 'Quản lý sứ mệnh'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $missions = missions::all();
        return view('admin.mission.create',compact('missions'),[
            'title' => 'Thêm mới sứ mệnh'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'desc' => 'required',
            'logo' =>'required',
            'image' => 'required'
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề sứ mệnh !',
            'subtitle.required' => 'Vui lòng nhập tiêu đề phụ',
            'desc.required' => 'Vui lòng nhập mô tả',
            'logo.required' => 'Vui lòng thêm ảnh tiêu đề',
            'image.required' => 'Vui lòng thêm ảnh'

        ] );
        // Kiểm tra xem mission_id có tồn tại trong bảng mission hay không
        $mission = new missions;
        $mission->title = $request->title;
        $mission->subtitle = $request->subtitle;
        $mission->desc = $request->desc;
        $title= $mission->title;
        $logo = $request->file('logo'); // Lấy file ảnh từ file Upload
        if ($logo) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $logo->storeAs('public/images/mission/logo', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $mission->logo = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $images = $request->file('image'); // Lấy file ảnh từ file Upload
        if ($request->hasFile('image')) {
            $paths = [];
            foreach ($images as $index => $image) {
                $fileName = Str::slug($title) . '-' . ($index + 1).'.jpg'; //Lưu tên ảnh theo Slug Title và thứ tự tăng dần
                $image->storeAs( 'public/images/mission',$fileName); // Lưu ảnh đã thêm vào đường dẫn này
                $path = $fileName; // Lưu tên file ảnh theo slug Title
                $paths[] = $path;
            }
            // Lưu các đường dẫn vào cột "image" trong cơ sở dữ liệu
            $mission->image = json_encode($paths);
        }
        $mission->active = $request->active ? 1 : 0;
        $mission->save();
        // Chuyển hướng về trang hiển thị danh sách mission hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('missions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(missions $mission)
    {
        $missions = missions::find($mission);
        return view('admin.mission.details',compact('missions','mission'),[
            'title' => 'Chi tiết sứ mệnh'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(missions $mission)
    {
        $missions = missions::find($mission);
        return view('admin.mission.edit',compact('missions','mission'),[
            'title' => 'Chỉnh sửa sứ mệnh'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, missions $mission)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'desc' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề sứ mệnh !',
            'subtitle.required' => 'Vui lòng nhập tiêu đề phụ',
            'desc.required' => 'Vui lòng nhập mô tả',
        ] );
        // Kiểm tra xem mission_id có tồn tại trong bảng mission hay không
        $mission->title = $request->title;
        $mission->subtitle = $request->subtitle;
        $mission->desc = $request->desc;
        $title= $mission->title;
        $logo = $request->file('logo'); // Lấy file ảnh từ file Upload
        if ($logo) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $logo->storeAs('public/images/mission/logo', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $mission->logo = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $images = $request->file('image'); // Lấy file ảnh từ file Upload
        if ($request->hasFile('image')) {
            $paths = [];
            foreach ($images as $index => $image) {
                $fileName = Str::slug($title) . '-' . ($index + 1).'.jpg'; //Lưu tên ảnh theo Slug Title và thứ tự tăng dần
                $image->storeAs( 'public/images/mission',$fileName); // Lưu ảnh đã thêm vào đường dẫn này
                $path = $fileName; // Lưu tên file ảnh theo slug Title
                $paths[] = $path;
            }
            // Lưu các đường dẫn vào cột "image" trong cơ sở dữ liệu
            $mission->image = json_encode($paths);
        }
        $mission->active = $request->active ? 1 : 0;
        $mission->save();
        // Chuyển hướng về trang hiển thị danh sách mission hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('missions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(missions $mission)
    {
        $mission->delete();
        // Chuyển hướng về trang danh sách mission hoặc trang khác (tuỳ ý)
        return redirect()->route('missions.index')->with('success', 'sứ mệnh đã được xóa thành công.');
    }
}
