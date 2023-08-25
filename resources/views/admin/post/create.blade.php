@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('posts.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success font-weight-bold float-right">Thêm mới</button>
            </div>
            <div class="card-body">
                @include('admin.error')

                <div class="form-group">
                    <label for="">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Post Title">
                </div>
                <div class="form-group">
                    <label for="">Alias</label>
                    <input name="alias" type="text" class="form-control" id="alias" placeholder="Post Alias">
                </div>
                <div id="image-gallery">
                    <input type="file" name="thumb" id="file-input" multiple onchange="previewImages(event)">
                    <div id="image-preview"></div>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input name="desc" type="text" class="form-control" id="" placeholder="Input Desc">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="cate_id" class="form-control" id="cate_id">
                        <option value="">Chọn danh mục</option>
                        @foreach($cates as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check">
                    <input name="active" type="checkbox" class="form-check-input" id="">
                    <label class="form-check-label" for="">Active</label>
                </div>
                <div class="form-check">
                    <input name="ishot" type="checkbox" class="form-check-input" id="">
                    <label class="form-check-label" for="">Is Hot</label>
                </div>
                <div class="form-check">
                    <input name="isnewfeed" type="checkbox" class="form-check-input" id="">
                    <label class="form-check-label" for="">Is New Feed</label>
                </div>
                <div class="form-group">
                    <label for="">Contents</label>
                    <textarea name="contents" class="form-control" id="content"></textarea>
                </div>
            </div>
            @csrf
        </form>
    </div>
@endsection
