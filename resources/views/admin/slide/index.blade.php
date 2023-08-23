@extends('admin.main')
@section('contents')
    <h3 class="bg-gradient-primary font-weight-bold p-3">{{$title}}</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{Route('slides.create')}}" class="btn btn-success px-4 mb-3 font-weight-bold py-2">Thêm mới slide</a>
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th>SlideID</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Short Desc</th>
                                            <th>Status</th>
                                            <th>Create_Time</th>
                                            <th>Update_Time</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($slides as $slide)
                                            <tr class="odd">
                                                <td>{{$slide->id}}</td>
                                                <td>{{$slide->title}}</td>
                                                <td>
                                                    <img width="150" src="{{ asset('storage/images/slides/'. $slide->image) }}" alt="Ảnh sản phẩm">
                                                </td>
                                                <td>{{$slide->short_desc}}</td>
                                                <td>
                                                    <label class="checkbox-container">
                                                        @if($slide->active == 1)
                                                            <input type="checkbox" checked >
                                                        @else
                                                            <input type="checkbox" >
                                                        @endif
                                                        <span class="custom-checkbox"></span>
                                                    </label>
                                                </td>

                                                <td>{{$slide->created_at}}</td>
                                                <td>{{$slide->updated_at}}</td>
                                                <td style="width: 20%">
                                                    <div class="d-flex justify-content-around">
                                                        <a href="{{ route('slides.edit', ['slide' => $slide]) }}" class="btn btn-info font-weight-bold px-4 py-2 mx-1 text-nowrap">Chỉnh sửa</a>
                                                        <a href="{{ route('slides.show', ['slide' => $slide]) }}" class="btn btn-warning font-weight-bold px-4 py-2 mx-1 text-nowrap">Chi tiết</a>
                                                        <form action="{{ route('slides.destroy', ['slide' => $slide]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger delete_column font-weight-bold px-4 py-2 mx-1 text-nowrap" type="submit" id="">Xóa</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
