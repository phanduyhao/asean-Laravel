@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('customers.store') }}" enctype="multipart/form-data" >
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('customers.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success font-weight-bold float-right">Thêm mới</button>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Customer Name</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="customer Title ">
                </div>
                <div class="form-group">
                    <label for="">Link</label>
                    <input name="link" type="text" class="form-control" id="title" placeholder="customer Link ">
                </div>
                <div class="image-gallery">
                    <input type="file" name="thumb" class="file-input" multiple onchange="previewImages('image-preview', 'file-input', event)">
                    <div id="image-preview"></div>
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
                <div class="form-check">
                    <input name="active" type="checkbox" class="form-check-input" id="">
                    <label class="form-check-label" for="">Active</label>
                </div>
            </div>
            <!-- /.card-body -->
            @csrf
        </form>
    </div>

@endsection
