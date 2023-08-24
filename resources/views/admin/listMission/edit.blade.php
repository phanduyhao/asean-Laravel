@extends('admin.main')
@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('listMissions.update',['listMission' => $listMission]) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card-footer flex-center-between">
                <a href="{{route('listMissions.index')}}" name="submit" type="submit" class="btn font-weight-bold btn-warning">Trở lại</a>
                <button name="submit" type="submit" class="btn btn-success font-weight-bold float-right">Cập nhật</button>
            </div>
            <div class="card-body">
                @include('admin.error')
                <div class="form-group">
                    <label for="">Title</label>
                    <input value="{{$listMission->title}}" name="title" type="text" class="form-control" id="title" placeholder="listMission Title ">
                </div>
                <div id="image-gallery">
                    <input type="file" name="thumb" id="file-input" multiple onchange="previewImages(event)">
                    <div id="image-preview"></div>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input value="{{$listMission->desc}}" name="desc" type="text" placeholder="listMission Description "  class="form-control" id="desc">
                </div>
                <div class="form-group">
                    <label for="">Mission Parent</label>
                    <select name="mission_id" class="form-control" id="mission_id">
                        @foreach($missions as $mission)
                            @if($mission->id == $listMission->mission_id)
                                <option value="{{ $mission->id }}">{{ $mission->title }}</option>
                            @endif
                        @endforeach
                            @foreach($missions as $mission)
                                @if($mission->id != $listMission->mission_id)
                                    <option value="{{ $mission->id }}">{{ $mission->title }}</option>
                                @endif
                            @endforeach
                    </select>
                </div>
                <div class="form-check">
                    @if($listMission->active == 1)
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
