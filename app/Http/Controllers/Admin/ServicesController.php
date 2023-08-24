<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = services::all();
        return view('admin.service.index',compact('services'),[
            'title' => 'Quản lý danh sách dịch vụ'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = services::all();
        return view('admin.service.create',compact('services'),[
            'title' => 'Thêm mới dịch vụ'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'thumb' => 'required',
            'desc' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
            'thumb.required' => 'Vui lòng nhập thêm ảnh !',
            'desc.required' => 'Vui lòng nhập mô tả!',
        ] );
        // Kiểm tra xem service_id có tồn tại trong bảng service hay không
        $service = new services;
        $service->title = $request->title;
        $title= $service->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/services', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $service->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $service->desc = $request->desc;
        $service->active = $request->active ? 1 : 0;
        $service->special = $request->special ? 1 : 0;
        $service->save();
        // Chuyển hướng về trang hiển thị danh sách service hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(services $service)
    {
        $services = services::find($service);
        return view('admin.service.edit',compact('services','service'),[
            'title' => 'Chỉnh sửa '
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, services $service)
    {
        $this->validate($request,[
            'title' => 'required',
            'desc' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
            'desc.required' => 'Vui lòng nhập mô tả!',
        ] );
        // Kiểm tra xem service_id có tồn tại trong bảng service hay không
        $service->title = $request->title;
        $title= $service->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/services', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $service->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $service->desc = $request->desc;
        $service->active = $request->active ? 1 : 0;
        $service->special = $request->special ? 1 : 0;
        $service->save();
        // Chuyển hướng về trang hiển thị danh sách service hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(services $service)
    {
        $service->delete();
        // Chuyển hướng về trang danh sách service hoặc trang khác (tuỳ ý)
        return redirect()->route('services.index')->with('success', 'dịch vụ đã được xóa thành công.');
    }
}
