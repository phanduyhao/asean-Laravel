@extends('admin.main')
@section('contents')
    <h3 class="bg-gradient-primary font-weight-bold p-3">{{$title}}</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{Route('missions.create')}}" class="btn btn-success px-4 mb-3 font-weight-bold py-2">Thêm mới sứ mệnh</a>
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
                                            <th>MissionID</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Description</th>
                                            <th>Logo</th>
                                            <th>Status</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($missions as $mission)
                                            <tr class="odd">
                                                <td>{{$mission->id}}</td>
                                                <td>{{$mission->title}}</td>
                                                <td>{{$mission->subtitle}}</td>
                                                <td>{!! $mission->desc !!}</td>
                                                <td>
                                                    <img width="150" src="{{ asset('storage/images/mission/logo/'. $mission->logo) }}" alt="Ảnh sản phẩm">
                                                </td>
                                                <td>
                                                    <label class="checkbox-container">
                                                        @if($mission->active == 1)
                                                            <input type="checkbox" checked >
                                                        @else
                                                            <input type="checkbox" >
                                                        @endif
                                                        <span class="custom-checkbox"></span>
                                                    </label>
                                                </td>
                                                <td style="width: 20%">
                                                    <div class="d-flex justify-content-around">
                                                        <a href="{{ route('missions.edit', ['mission' => $mission]) }}" class="btn btn-info font-weight-bold px-4 py-2 mx-1 text-nowrap">Chỉnh sửa</a>
                                                        <a href="{{ route('missions.show', ['mission' => $mission]) }}" class="btn btn-warning font-weight-bold px-4 py-2 mx-1 text-nowrap">Chi tiết</a>
                                                        <form action="{{ route('missions.destroy', ['mission' => $mission]) }}" method="POST">
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
