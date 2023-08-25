<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\cates;
use App\Models\locations;
use Illuminate\Http\Request;
use App\Models\posts;
use Illuminate\Support\Str;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = posts::all();
        $cates = cates::all();
        return view('admin.post.index',compact('posts','cates'),[
            'title' => 'Quản lý bài viết'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = posts::all();
        $cates = cates::all();
        return view('admin.post.create',compact('posts','cates'),[
            'title' => 'Thêm mới bài viết'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'alias' => 'required',
            'thumb' => 'required',
            'desc' => 'required',
            'contents' => 'required'
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề bài viết !',
            'alias.required' => 'Vui lòng nhập alias !',
            'desc.required' => 'Vui lòng nhập mô tả bài viết !',
            'contents.required' => 'Vui lòng nhập nội dung bài viết !',
            'thumb.required' => 'Vui lòng thêm ảnh!'
        ] );
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $cates = cates::all();
        $post = new posts;
        $post->title = $request->title;
        $post->alias = $request->alias;
        $title= $post->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.jpg'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/posts', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $post->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $post->cate_id = $request->cate_id;
        $post->description = $request->desc;
        $post->contents = $request->contents;
        $post->active = $request->active ? 1 : 0;
        $post->ishot = $request->ishot ? 1 : 0;
        $post->isnewfeed = $request->isnewfeed ? 1 : 0;
        $post->save();
        // Chuyển hướng về trang hiển thị danh sách post hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(posts $post)
    {
        $posts = posts::find($post);
        $cates = cates::all();
        return view('admin.post.details',compact('posts','post','cates'),[
            'title' => 'Chi tiết bài viết'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(posts $post)
    {
        $posts = posts::find($post);
        $cates = cates::all();
        return view('admin.post.edit',compact('posts','post','cates'),[
            'title' => 'Chỉnh sửa bài viết'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, posts $post)
    {
        $this->validate($request,[
            'title' => 'required',
            'alias' => 'required',
            'desc' => 'required',
            'contents' => 'required'
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề bài viết !',
            'alias.required' => 'Vui lòng nhập alias !',
            'desc.required' => 'Vui lòng nhập mô tả bài viết !',
            'contents.required' => 'Vui lòng nhập nội dung bài viết !',
        ] );
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $cates = cates::all();
        $post->title = $request->title;
        $post->alias = $request->alias;
        $title= $post->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.jpg'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/posts', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $post->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $post->cate_id = $request->cate_id;
        $post->location = $request->location;
        $post->description = $request->desc;
        $post->contents = $request->contents;
        $post->active = $request->active ? 1 : 0;
        $post->ishot = $request->ishot ? 1 : 0;
        $post->isnewfeed = $request->isnewfeed ? 1 : 0;
        $post->save();
        // Chuyển hướng về trang hiển thị danh sách post hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(posts $post)
    {
        $post->delete();
        // Chuyển hướng về trang danh sách post hoặc trang khác (tuỳ ý)
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được xóa thành công.');
    }
}
