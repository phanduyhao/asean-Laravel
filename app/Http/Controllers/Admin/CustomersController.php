<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sections;
use Illuminate\Http\Request;
use App\Models\customers;
use Illuminate\Support\Str;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        $customers = customers::all();
        return view('admin.customer.index',compact('customers','sections'),[
            'title' => 'Quản lý đối tác'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = sections::all();
        $customers = customers::all();
        return view('admin.customer.create',compact('customers','sections'),[
            'title' => 'Thêm mới đối tác'
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
            'link' => 'required',
            'section_id' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
            'thumb.required' => 'Vui lòng nhập thêm ảnh !',
            'link.required' => 'Vui lòng nhập link!',
            'section_id.required' => 'Vui lòng chọn section!',
        ] );
        // Kiểm tra xem customer_id có tồn tại trong bảng customer hay không
        $customer = new customers;
        $customer->title = $request->title;
        $customer->link = $request->link;
        $title= $customer->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug title
            $thumb->storeAs('public/images/customers', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $customer->thumb = $fileName; // Lưu tiêu đề file ảnh theo slug title
        }
        $customer->section_id = $request->section_id;
        $customer->active = $request->active ? 1 : 0;
        $customer->save();
        // Chuyển hướng về trang hiển thị danh sách customer hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customers $customer)
    {
        $sections = sections::all();
        $customers = customers::find($customer);
        return view('admin.customer.edit',compact('customers','customer','sections'),[
            'title' => 'Chỉnh sửa '
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customers $customer)
    {
        $sections = sections::all();
        $this->validate($request,[
            'title' => 'required',
            'link' => 'required',
            'section_id' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề  !',
            'link.required' => 'Vui lòng nhập đánh giá!',
            'section_id.required' => 'Vui lòng chọn section!',
        ] );
        // Kiểm tra xem customer_id có tồn tại trong bảng customer hay không
        $customer->title = $request->title;
        $customer->link = $request->link;
        $title= $customer->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.png'; // Tên ảnh theo Slug title
            $thumb->storeAs('public/images/customers', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $customer->thumb = $fileName; // Lưu tiêu đề file ảnh theo slug title
        }
        $customer->section_id = $request->section_id;
        $customer->active = $request->active ? 1 : 0;
        $customer->save();
        // Chuyển hướng về trang hiển thị danh sách customer hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customers $customer)
    {
        $customer->delete();
        // Chuyển hướng về trang danh sách customer hoặc trang khác (tuỳ ý)
        return redirect()->route('customers.index')->with('success', 'cảm nhận khách hàng đã được xóa thành công.');
    }
}
