@extends('admin.main')
@section('contents')
    <div class="container">
        <h1>Cài Đặt Options</h1>
        <form action="{{ route('admin.options.save') }}" method="post">
            @csrf
{{--            <div class="form-group">--}}
{{--                <label for="category_id">Chọn Danh Mục</label>--}}
{{--                <select name="category_id" id="category_id" class="form-control">--}}
{{--                    <option value="">Chọn danh mục</option>--}}
{{--                    @foreach ($cates as $category)--}}
{{--                        <option value="{{ $category->id }}">{{ $category->title }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="post_ids">Chọn Bài Viết</label>--}}
{{--                <select name="post_ids[]" id="post_ids" class="form-control" multiple>--}}
{{--                    --}}{{-- Lựa chọn bài viết tương ứng với danh mục --}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="position-relative select-contain">
                <select class="w-100" name="cate_id" id="cate-select">
                    <option value="">--Select Country--</option>
                    @foreach($cates as $cate)
                        <option value="{{ $cate->id }}" >{{ $cate->title }}</option>
                    @endforeach
                </select>
                <div class="arrow-down position-absolute"></div>
            </div>
            <div class="position-relative select-contain" id="addressContainer">
                <select class="w-100" name="post_ids" id="post-select" multiple>
                    <option value="">--Select City--</option>
                    @foreach($posts as $post)
                        <option value="{{ $post->id }}" >{{ $post->title }}</option>
                    @endforeach
                </select>
                <div class="arrow-down position-absolute"></div>
            </div>
            <div class="form-group">
                <label for="post_count">Số Lượng Bài Viết</label>
                <input type="number" name="post_count" id="post_count" class="form-control" min="1" value="1">
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
