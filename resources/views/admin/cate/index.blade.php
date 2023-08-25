@extends('admin.main')
@section('contents')
    <h3 class="bg-gradient-primary font-weight-bold p-3">{{$title}}</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{Route('cates.create')}}" class="btn btn-success px-4 mb-3 font-weight-bold py-2">Thêm mới danh mục</a>
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
                                            <th>CateID</th>
                                            <th>Title</th>
                                            <th>Alias</th>
                                            <th>Short Desc</th>
                                            <th>Parent_id</th>
                                            <th>Section</th>
                                            <th>Status</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cates as $cate)
                                            <tr class="odd">
                                                <td>{{$cate->id}}</td>
                                                <td>{{$cate->title}}</td>
                                                <td>{{$cate->alias}}</td>
                                                <td>{{$cate->short_desc}}</td>
                                                @if($cate->parent_id == null)
                                                    <td>0</td>
                                                @else
                                                    <td>{{$cate->parent_id}}</td>
                                                @endif
                                                @foreach($sections as $section)
                                                    @if($cate->section_id == $section->id)
                                                        <td>{{$section->title}}</td>
                                                    @endif
                                                @endforeach
                                                <td>
                                                    <label class="checkbox-container">
                                                        @if($cate->active == 1)
                                                            <input type="checkbox" checked >
                                                        @else
                                                            <input type="checkbox" >
                                                        @endif
                                                        <span class="custom-checkbox"></span>
                                                    </label>
                                                </td>
                                                <td style="width: 20%">
                                                    <div class="d-flex justify-content-around">
                                                        <a href="{{ route('cates.edit', ['cate' => $cate]) }}" class="btn btn-info font-weight-bold px-4 py-2">Chỉnh sửa</a>
                                                        <form action="{{ route('cates.destroy', ['cate' => $cate]) }}" method="POST">
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
