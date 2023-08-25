<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sections;
use Illuminate\Http\Request;
use App\Models\testimonials;
use Illuminate\Support\Str;

class testimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        $testimonials = testimonials::all();
        return view('admin.testimonial.index',compact('testimonials','sections'),[
            'title' => 'Quản lý cảm nhận khách hàng'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = sections::all();
        $testimonials = testimonials::all();
        return view('admin.testimonial.create',compact('testimonials','sections'),[
            'title' => 'Thêm mới cảm nhận khách hàng'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sections = sections::all();
        $this->validate($request,[
            'name' => 'required',
            'thumb' => 'required',
            'comment' => 'required',
            'section_id' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên  !',
            'thumb.required' => 'Vui lòng nhập thêm ảnh !',
            'comment.required' => 'Vui lòng nhập đánh giá!',
            'section_id.required' => 'Vui lòng chọn section!',
        ] );
        // Kiểm tra xem testimonial_id có tồn tại trong bảng testimonial hay không
        $testimonial = new testimonials;
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $name= $testimonial->name;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($name) . '.png'; // Tên ảnh theo Slug name
            $thumb->storeAs('public/images/testimonials', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $testimonial->thumb = $fileName; // Lưu tên file ảnh theo slug name
        }
        $testimonial->section_id = $request->section_id;
        $testimonial->comment = $request->comment;
        $testimonial->save();
        // Chuyển hướng về trang hiển thị danh sách testimonial hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('testimonials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(testimonials $testimonial)
    {
        $sections = sections::all();
        $testimonials = testimonials::find($testimonial);
        return view('admin.testimonial.edit',compact('testimonials','testimonial','sections'),[
            'title' => 'Chỉnh sửa '
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, testimonials $testimonial)
    {
        $sections = sections::all();
        $this->validate($request,[
            'name' => 'required',
            'thumb' => 'required',
            'comment' => 'required',
            'section_id' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên  !',
            'thumb.required' => 'Vui lòng nhập thêm ảnh !',
            'comment.required' => 'Vui lòng nhập đánh giá!',
            'section_id.required' => 'Vui lòng chọn section!',
        ] );
        // Kiểm tra xem testimonial_id có tồn tại trong bảng testimonial hay không
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $name= $testimonial->name;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($name) . '.png'; // Tên ảnh theo Slug name
            $thumb->storeAs('public/images/testimonials', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $testimonial->thumb = $fileName; // Lưu tên file ảnh theo slug name
        }
        $testimonial->section_id = $request->section_id;
        $testimonial->comment = $request->comment;
        $testimonial->save();
        // Chuyển hướng về trang hiển thị danh sách testimonial hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(testimonials $testimonial)
    {
        $testimonial->delete();
        // Chuyển hướng về trang danh sách testimonial hoặc trang khác (tuỳ ý)
        return redirect()->route('testimonials.index')->with('success', 'cảm nhận khách hàng đã được xóa thành công.');
    }
}
