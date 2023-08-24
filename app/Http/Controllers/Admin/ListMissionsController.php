<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\missions;
use Illuminate\Http\Request;
use App\Models\listMissions;
use Illuminate\Support\Str;

class listMissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $missions = missions::all();
        $listMissions = listMissions::all();
        return view('admin.listMission.index',compact('listMissions','missions'),[
            'title' => 'Quản lý danh sách sứ mệnh'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $missions = missions::all();
        $listMissions = listMissions::all();
        return view('admin.listMission.create',compact('listMissions','missions'),[
            'title' => 'Thêm mới sứ mệnh'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $missions = missions::all();
        $this->validate($request,[
            'title' => 'required',
            'thumb' => 'required',
            'desc' => 'required',
            'mission_id' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
            'thumb.required' => 'Vui lòng nhập thêm ảnh !',
            'desc.required' => 'Vui lòng nhập mô tả!',
            'mission_id.required' => 'Vui lòng chọn danh mục!',
        ] );
        // Kiểm tra xem listMission_id có tồn tại trong bảng listMission hay không
        $listMission = new listMissions;
        $listMission->title = $request->title;
        $title= $listMission->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/listMissions', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $listMission->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $listMission->mission_id = $request->mission_id;
        $listMission->desc = $request->desc;
        $listMission->active = $request->active ? 1 : 0;
        $listMission->save();
        // Chuyển hướng về trang hiển thị danh sách listMission hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('listMissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(listMissions $listMissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(listMissions $listMission)
    {
        $missions = missions::all();
        $listMissions = listMissions::find($listMission);
        return view('admin.listMission.edit',compact('listMissions','listMission','missions'),[
            'title' => 'Chỉnh sửa '
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, listMissions $listMission)
    {
        $missions = missions::all();
        $this->validate($request,[
            'title' => 'required',
            'desc' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
            'desc.required' => 'Vui lòng nhập mô tả!',
        ] );
        // Kiểm tra xem listMission_id có tồn tại trong bảng listMission hay không
        $listMission->title = $request->title;
        $title= $listMission->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/listMissions', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $listMission->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $listMission->mission_id = $request->mission_id;
        $listMission->desc = $request->desc;
        $listMission->active = $request->active ? 1 : 0;
        $listMission->save();
        // Chuyển hướng về trang hiển thị danh sách listMission hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('listMissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(listMissions $listMission)
    {
        $listMission->delete();
        // Chuyển hướng về trang danh sách listMission hoặc trang khác (tuỳ ý)
        return redirect()->route('listMissions.index')->with('success', 'sứ mệnh đã được xóa thành công.');
    }
}
