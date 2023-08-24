@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('missions.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('missions.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success font-weight-bold float-right">Thêm mới</button>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder=" Title ">
                </div>
                <div class="form-group">
                    <label for="">Subtitle</label>
                    <input name="subtitle" type="text" class="form-control" placeholder="Subtitle ">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" class="form-control" id="content"></textarea>
                </div>
                <div class="image-gallery">
                    <label for="" class="mr-4">Image title</label>
                    <input type="file" name="logo" class="file-input" multiple onchange="previewImages('image-preview', 'file-input', event)">
                    <div id="image-preview"></div>
                </div>
                <div class="image-gallery">
                    <label for="" class="mt-3 mr-4">List Images</label>
                    <input type="file" name="image[]" class="file-input2" multiple onchange="previewImages('image-preview2', 'file-input2', event)">
                    <div id="image-preview2"></div>
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
