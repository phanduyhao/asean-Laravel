@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('cates.store') }}" >
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('cates.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success font-weight-bold float-right">Thêm mới</button>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Category Title ">
                </div>
                <div class="form-group">
                    <label for="">Alias</label>
                    <input name="alias" type="text" class="form-control" placeholder="Category Alias " id="alias">
                </div>
                <div class="form-group">
                    <label for="">Short Desc</label>
                    <input name="desc" type="text" placeholder="Category Description "  class="form-control" id="desc">
                </div>
                <div class="form-group">
                    <label for="">Parent Id</label>
                    <select name="parent_id" class="form-control" id="parent_id">
                        <option value="">Chọn danh mục cha</option>
                        @foreach($cates as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->id }}-{{ $cate->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Section</label>
                    <select name="section_id" class="form-control" id="parent_id">
                        <option value="">Chọn section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->id }}-{{ $section->title }}</option>
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
