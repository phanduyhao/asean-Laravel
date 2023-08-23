<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slides;
use Illuminate\Support\Str;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = slides::all();
        return view('admin.slide.index',compact('slides'),[
            'title' => 'Quản lý Slides'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $slides = slides::all();
        return view('admin.slide.create',compact('slides'),[
            'title' => 'Thêm mới Slides'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required', // Kiểm tra đã nhập Email chưa, có đúng định dạng Email không ?
            'image' => 'required' // Kiểm tra đã nhập mật khẩu chưa ?
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề Slide !',
            'image.required' => 'Vui lòng thêm ảnh!'
        ] );
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $slide = new slides;
        $slide->title = $request->title;
        $title= $slide->title;
        $image = $request->file('image'); // Lấy file ảnh từ file Upload
        if ($image) {
            $fileName = Str::slug($title) . '.jpg'; // Tên ảnh theo Slug Title
            $image->storeAs('public/images/slides', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $slide->image = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $slide->short_desc = $request->desc;
        $slide->active = $request->active ? 1 : 0;
        $slide->save();
        // Chuyển hướng về trang hiển thị danh sách slide hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('slides.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(slides $slide)
    {
        $slides = slides::find($slide);
        return view('admin.slide.details',compact('slides','slide'),[
            'title' => 'Chi tiết Slides'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(slides $slide)
    {
        $slides = slides::find($slide);
        return view('admin.slide.edit',compact('slides','slide'),[
            'title' => 'Chỉnh sửa Slides'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, slides $slide)
    {
        $this->validate($request,[
            'title' => 'required', // Kiểm tra đã nhập Email chưa, có đúng định dạng Email không ?
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề Slide !',
        ] );
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $slide->title = $request->title;
        $title= $slide->title;
        $image = $request->file('image'); // Lấy file ảnh từ file Upload
        if ($image) {
            $fileName = Str::slug($title) . '.jpg'; // Tên ảnh theo Slug Title
            $image->storeAs('public/images/slides', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $slide->image = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $slide->short_desc = $request->desc;
        $slide->active = $request->active ? 1 : 0;
        $slide->save();
        // Chuyển hướng về trang hiển thị danh sách slide hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('slides.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(slides $slide)
    {
        $slide->delete();
        // Chuyển hướng về trang danh sách slide hoặc trang khác (tuỳ ý)
        return redirect()->route('slides.index')->with('success', 'slide đã được xóa thành công.');
    }
}
