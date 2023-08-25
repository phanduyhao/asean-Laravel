@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('testimonials.store') }}" enctype="multipart/form-data" >
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('testimonials.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success font-weight-bold float-right">Thêm mới</button>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" id="title" placeholder="testimonial Title ">
                </div>
                <div class="form-group">
                    <label for="">Position</label>
                    <input name="position" type="text" class="form-control" id="title" placeholder="testimonial Title ">
                </div>
                <div class="image-gallery">
                    <input type="file" name="thumb" class="file-input" multiple onchange="previewImages('image-preview', 'file-input', event)">
                    <div id="image-preview"></div>
                </div>
                <div class="form-group">
                    <label for="">Comment</label>
                    <input name="comment" type="text" placeholder="Comment"  class="form-control" id="comment">
                </div>
                <div class="form-group">
                    <label for="">Section</label>
                    <select name="section_id" class="form-control" id="service_id">
                        <option value="">Chọn section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            @csrf
        </form>
    </div>

@endsection
