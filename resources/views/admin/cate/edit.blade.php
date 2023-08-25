@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('cates.update',['cate' => $cate]) }}" >
            @method('PATCH')
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('cates.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success font-weight-bold float-right">Cập nhật</button>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Title</label>
                    <input value="{{$cate->title}}" name="title" type="text" class="form-control" id="title" placeholder="Category Title ">
                </div>
                <div class="form-group">
                    <label for="">Alias</label>
                    <input value="{{$cate->alias}}" name="alias" type="text" class="form-control" placeholder="Category Alias " id="alias">
                </div>
                <div class="form-group">
                    <label for="">Short Desc</label>
                    <input value="{{$cate->short_desc}}" name="desc" type="text" placeholder="Category Description "  class="form-control" id="desc">
                </div>
                <div class="form-group">
                    <label for="">Parent Id</label>
                    <select name="parent_id" class="form-control" id="parent_id">
                       @if($cate->parent_id == null)
                            <option value="">Chọn danh mục cha</option>
                            @foreach($cates as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->id }}-{{ $cate->title }}</option>
                            @endforeach
                       @else
                            @foreach($cates as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->id }}-{{ $cate->title }}</option>
                            @endforeach
                            <option value="">Chọn danh mục cha</option>
                        @endif
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
                    @if($cate->active == 1)
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
