@extends('admin.main')
@section('contents')
    <h3 class="bg-gradient-primary font-weight-bold p-3">{{$title}}</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{Route('sections.create')}}" class="btn btn-success px-4 mb-3 font-weight-bold py-2">Thêm mới section</a>
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
                                            <th>sectionID</th>
                                            <th>Title</th>
                                            <th>Thumb</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Special</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sections as $section)
                                            <tr class="odd">
                                                <td>{{$section->id}}</td>
                                                <td>{{$section->title}}</td>
                                                <td>
                                                    <img width="250px" src="{{ asset('storage/images/sections/'. $section->thumb) }}" alt="Ảnh sản phẩm">
                                                </td>
                                                <td>{{$section->desc}}</td>
                                                <td>
                                                    <label class="checkbox-container">
                                                        @if($section->active == 1)
                                                            <input type="checkbox" checked >
                                                        @else
                                                            <input type="checkbox" >
                                                        @endif
                                                        <span class="custom-checkbox"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="checkbox-container">
                                                        @if($section->special == 1)
                                                            <input type="checkbox" checked >
                                                        @else
                                                            <input type="checkbox" >
                                                        @endif
                                                        <span class="custom-checkbox"></span>
                                                    </label>
                                                </td>
                                                <td style="width: 20%">
                                                    <div class="d-flex justify-content-around">
                                                        <a href="{{ route('sections.edit', ['section' => $section]) }}" class="btn btn-info font-weight-bold px-4 py-2">Chỉnh sửa</a>
                                                        <form action="{{ route('sections.destroy', ['section' => $section]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger delete_column font-weight-bold px-4 py-2" type="submit" id="">Xóa</button>
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
