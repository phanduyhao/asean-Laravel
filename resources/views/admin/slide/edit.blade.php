@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('slides.update', ['slide' => $slide]) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('slides.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success float-right font-weight-bold">Cập nhật</button>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Title</label>
                    <input value="{{$slide->title}}" name="title" type="text" class="form-control" id="title" placeholder="Title Slide">
                </div>
                <div id="image-gallery">
                    <input type="file" name="image" id="file-input" multiple onchange="previewImages(event)">
                    <div id="image-preview"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Short Desc</label>
                    <input value="{{$slide->short_desc}}" name="desc" type="text" class="form-control" id="" placeholder="Input Desc">
                </div>
                <div class="form-check">
                    @if($slide->active == 1)
                        <input checked name="active" type="checkbox" class="form-check-input" id="">
                    @else
                        <input name="active" type="checkbox" class="form-check-input" id="">
                    @endif
                    <label class="form-check-label" for="">Active</label>
                </div>
            </div>
        </form>
    </div>
@endsection
