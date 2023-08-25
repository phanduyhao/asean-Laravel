<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sections;
use Illuminate\Http\Request;
use App\Models\cates;
use Illuminate\Support\Str;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        $cates = cates::all();
        return view('admin.cate.index',compact('cates','sections'),[
            'title' => 'Quản lý danh mục'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = sections::all();
        $cates = cates::all();
        return view('admin.cate.create',compact('cates','sections'),[
            'title' => 'Thêm mới danh mục'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required', // Kiểm tra đã nhập Email chưa, có đúng định dạng Email không ?
            'alias' => 'required' // Kiểm tra đã nhập mật khẩu chưa ?
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề danh mục !',
            'alias.required' => 'Vui lòng nhập Alias'
        ] );
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $cate = new cates;
        $cate->title = $request->title;
        $cate->short_desc = $request->desc;
        $cate->alias = $request->alias;
        $cate->parent_id = $request->parent_id;
        $cate->section_id = $request->section_id;
        $cate->active = $request->active ? 1 : 0;
        $cate->save();
        // Chuyển hướng về trang hiển thị danh sách cate hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('cates.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(cates $cates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cates $cate)
    {
        $sections = sections::all();
        $cates = cates::find($cate);
        return view('admin.cate.edit',compact('cates','cate','sections'),[
            'title' => 'Chỉnh sửa danh mục'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cates $cate)
    {
        $this->validate($request,[
            'title' => 'required', // Kiểm tra đã nhập Email chưa, có đúng định dạng Email không ?
            'alias' => 'required' // Kiểm tra đã nhập mật khẩu chưa ?
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề danh mục !',
            'alias.required' => 'Vui lòng nhập Alias'
        ]);
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $cate->title = $request->title;
        $cate->short_desc = $request->desc;
        $cate->alias = $request->alias;
        $cate->parent_id = $request->parent_id;
        $cate->active = $request->active ? 1 : 0;
        $cate->save();
        // Chuyển hướng về trang hiển thị danh sách cate hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('cates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cates $cate)
    {
        $cate->delete();
        // Chuyển hướng về trang danh sách cate hoặc trang khác (tuỳ ý)
        return redirect()->route('cates.index')->with('success', 'danh mục đã được xóa thành công.');
    }
}
