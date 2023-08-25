<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sections;
use Illuminate\Support\Str;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        return view('admin.section.index',compact('sections'),[
            'title' => 'Quản lý danh sách section'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = sections::all();
        return view('admin.section.create',compact('sections'),[
            'title' => 'Thêm mới section'
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
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
            'thumb.required' => 'Vui lòng nhập thêm ảnh !',
        ] );
        // Kiểm tra xem section_id có tồn tại trong bảng section hay không
        $section = new sections;
        $section->title = $request->title;
        $title= $section->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/sections', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $section->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $section->desc = $request->desc;
        $section->active = $request->active ? 1 : 0;
        $section->special = $request->special ? 1 : 0;
        $section->save();
        // Chuyển hướng về trang hiển thị danh sách section hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $section)
    {
        $sections = sections::find($section);
        return view('admin.section.edit',compact('sections','section'),[
            'title' => 'Chỉnh sửa '
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sections $section)
    {
        $this->validate($request,[
            'title' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
        ] );
        // Kiểm tra xem section_id có tồn tại trong bảng section hay không
        $section->title = $request->title;
        $title= $section->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/sections', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $section->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $section->desc = $request->desc;
        $section->active = $request->active ? 1 : 0;
        $section->special = $request->special ? 1 : 0;
        $section->save();
        // Chuyển hướng về trang hiển thị danh sách section hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sections $section)
    {
        $section->delete();
        // Chuyển hướng về trang danh sách section hoặc trang khác (tuỳ ý)
        return redirect()->route('sections.index')->with('success', 'section đã được xóa thành công.');
    }
}
