@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('posts.update', ['post' => $post]) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('posts.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success float-right font-weight-bold">Cập nhật</button>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Title</label>
                    <input value="{{$post->title}}" name="title" type="text" class="form-control" id="title" placeholder="Post Title">
                </div>
                <div class="form-group">
                    <label for="">Alias</label>
                    <input value="{{$post->alias}}" name="alias" type="text" class="form-control" id="alias" placeholder="Post Alias">
                </div>
                <div id="image-gallery">
                    <input type="file" name="thumb" id="file-input" multiple onchange="previewImages(event)">
                    <div id="image-preview"></div>
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="cate_id" class="form-control" id="cate_id">
                        @foreach($cates as $cate)
                            @if($cate->id == $post->cate_id)
                                <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                            @endif
                        @endforeach
                            @foreach($cates as $cate)
                                @if($cate->id != $post->cate_id)
                                    <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                                @endif
                            @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="">Description</label>
                    <input value="{{$post->description}}" name="desc" type="text" class="form-control" id="" placeholder="Input Desc">
                </div>
                <div class="form-check">
                    @if($post->active == 1)
                        <input checked name="active" type="checkbox" class="form-check-input" id="">
                    @else
                        <input name="active" type="checkbox" class="form-check-input" id="">
                    @endif
                    <label class="form-check-label" for="">Active</label>
                </div>
                <div class="form-check">
                    @if($post->ishot == 1)
                        <input checked name="active" type="checkbox" class="form-check-input" id="">
                    @else
                        <input name="active" type="checkbox" class="form-check-input" id="">
                    @endif
                    <label class="form-check-label" for="">IsHot</label>
                </div>
                <div class="form-check">
                    @if($post->isnewfeed == 1)
                        <input checked name="active" type="checkbox" class="form-check-input" id="">
                    @else
                        <input name="active" type="checkbox" class="form-check-input" id="">
                    @endif
                    <label class="form-check-label" for="">IsNewFeed</label>
                </div>
                <div class="form-group">
                    <label for="">Contents</label>
                    <textarea name="contents" class="form-control" id="content">{{$post->contents}}</textarea>
                </div>
            </div>
        </form>
    </div>
@endsection
