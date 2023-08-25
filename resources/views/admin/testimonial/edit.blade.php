@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('testimonials.update',['testimonial' => $testimonial]) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('testimonials.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success font-weight-bold float-right">Cập nhật</button>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="{{$testimonial->name}}" name="name" type="text" class="form-control" id="title" placeholder="testimonial Title ">
                </div>
                <div class="form-group">
                    <label for="">Position</label>
                    <input value="{{$testimonial->position}}" name="position" type="text" class="form-control" id="title" placeholder="testimonial Title ">
                </div>
                <div id="image-gallery">
                    <input type="file" name="thumb" id="file-input" multiple onchange="previewImages(event)">
                    <div id="image-preview"></div>
                </div>
                <div class="form-group">
                    <label for="">Comment</label>
                    <input value="{{$testimonial->comment}}" name="comment" type="text" placeholder="testimonial commentription "  class="form-control" id="comment">
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
        </form>
    </div>
@endsection
