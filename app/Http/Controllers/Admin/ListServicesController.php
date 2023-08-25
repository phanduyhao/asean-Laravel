<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sections;
use Illuminate\Http\Request;
use App\Models\listServices;
use Illuminate\Support\Str;

class listServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        $listServices = listServices::all();
        return view('admin.listService.index',compact('listServices','sections'),[
            'title' => 'Quản lý danh sách dịch vụ'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = sections::all();
        $listServices = listServices::all();
        return view('admin.listService.create',compact('listServices','sections'),[
            'title' => 'Thêm mới dịch vụ'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sections = sections::all();
        $this->validate($request,[
            'title' => 'required',
            'thumb' => 'required',
            'desc' => 'required',
            'service_id' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
            'thumb.required' => 'Vui lòng nhập thêm ảnh !',
            'desc.required' => 'Vui lòng nhập mô tả!',
            'service_id.required' => 'Vui lòng chọn dịch vụ cha!',
        ] );
        // Kiểm tra xem listService_id có tồn tại trong bảng listService hay không
        $listService = new listServices;
        $listService->title = $request->title;
        $title= $listService->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/listServices', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $listService->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $listService->service_id = $request->service_id;
        $listService->desc = $request->desc;
        $listService->active = $request->active ? 1 : 0;
        $listService->save();
        // Chuyển hướng về trang hiển thị danh sách listService hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('listServices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(listServices $listServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(listServices $listService)
    {
        $sections = sections::all();
        $listServices = listServices::find($listService);
        return view('admin.listService.edit',compact('listServices','listService','sections'),[
            'title' => 'Chỉnh sửa '
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, listServices $listService)
    {
        $sections = sections::all();
        $this->validate($request,[
            'title' => 'required',
            'desc' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
            'desc.required' => 'Vui lòng nhập mô tả!',
        ] );
        // Kiểm tra xem listService_id có tồn tại trong bảng listService hay không
        $listService->title = $request->title;
        $title= $listService->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/listServices', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $listService->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $listService->service_id = $request->service_id;
        $listService->desc = $request->desc;
        $listService->active = $request->active ? 1 : 0;
        $listService->save();
        // Chuyển hướng về trang hiển thị danh sách listService hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('listServices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(listServices $listService)
    {
        $listService->delete();
        // Chuyển hướng về trang danh sách listService hoặc trang khác (tuỳ ý)
        return redirect()->route('listServices.index')->with('success', 'dịch vụ đã được xóa thành công.');
    }
}
