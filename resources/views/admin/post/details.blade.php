@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div>
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('posts.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <a href="{{ route('posts.edit', ['post' => $post]) }}" name="submit" type="submit" class="btn float-right font-weight-bold btn-success">Chỉnh sửa</a>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Title</label>
                    <input disabled value="{{$post->title}}" class="form-control text-black">
                </div>
                <div class="form-group">
                    <label for="">Alias</label>
                    <input disabled value="{{$post->alias}}"class="form-control text-black">
                </div>
                <div id="image-gallery">
                    <label for="">Thumb</label>
                    <div>
                        <img width="200" src="{{ asset('storage/images/posts/'. $post->thumb) }}" alt="Ảnh đại diện">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    @foreach($cates as $cate)
                        @if($post->cate_id == $cate->id)
                            <input disabled value="{{$cate->title}}" class="form-control text-black">
                        @endif
                    @endforeach
                </div>

                <div class="form-group mt-2">
                    <label for="">Description</label>
                    <input disabled value="{{$post->description}}" class="form-control text-black">
                </div>
                <div class="form-check">
                    <label class="checkbox-container">
                        Active
                        @if($post->active == 1)
                            <input type="checkbox" checked >
                        @else
                            <input type="checkbox" >
                        @endif
                        <span class="ml-2 custom-checkbox"></span>
                    </label>
                </div>
                <div class="form-check">
                     <label class="checkbox-container">
                         Is Hot
                        @if($post->ishot == 1)
                            <input type="checkbox" checked >
                        @else
                            <input type="checkbox" >
                        @endif
                        <span class="ml-2 custom-checkbox"></span>
                    </label>
                </div>
                <div class="form-check">
                   <label class="checkbox-container">
                       Is New Feed
                        @if($post->isnewfeed == 1)
                            <input type="checkbox" checked >
                        @else
                            <input type="checkbox" >
                        @endif
                        <span class="ml-2 custom-checkbox"></span>
                    </label>
                </div>
                <div class="form-group mt-4">
                    <label for="">Contents</label>
                    {{--          Hiển thị TEXT thay vì HTML                      --}}
                    <div class="border border-width-2 p-4">
                        {!! $post->contents !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
