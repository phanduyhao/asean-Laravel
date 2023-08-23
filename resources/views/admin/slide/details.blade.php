@extends('admin.main')
@section('contents')
    <h5 class="bg-gradient-primary font-weight-bold p-3 ">{{$title}} " {{$slide->title}} "</h5>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{route('slides.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning mb-3 px-3 py-2">Trở lại</a>
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th>SlideID</th>
                                            <th>Title</th>
                                            <th>Short Desc</th>
                                            <th>Status</th>
                                            <th>Create_Time</th>
                                            <th>Update_Time</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td>{{$slide->id}}</td>
                                                <td>{{$slide->title}}</td>
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
                                                        <a href="{{ route('slides.edit', ['slide' => $slide]) }}" class="btn btn-info font-weight-bold px-4 py-2">Chỉnh sửa</a>
                                                        <form action="{{ route('slides.destroy', ['slide' => $slide]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger delete_column font-weight-bold px-4 py-2" type="submit" id="">Xóa</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <h3>Images</h3>
                                    <div class="text-center border border-width-2 p-4">
                                            <img class="img-fluid w-50 mb-3" src="{{ asset('storage/images/slides/' . $slide->image) }}" alt="Slide Image">
                                    </div>
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
