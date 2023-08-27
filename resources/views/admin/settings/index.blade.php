@extends('admin.main')
@section('contents')
<form method="POST" action="{{ route('options.store') }}">
    @csrf
    @foreach ($sections as $section)
        <div>
            <label>{{ $section->name }}</label>
            <select name="options[{{ $section->key }}][section_id]" class="section-select">
                <option value="">Chọn section</option>
                @foreach ($sections as $sectionItem)
                    <option value="{{ $sectionItem->id }}" data-section-id="{{ $sectionItem->id }}">{{ $sectionItem->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="sub-data" id="sub-data-{{ $section->key }}"></div>

    @endforeach
    <button type="submit">Lưu Cài Đặt</button>
</form>
@endsection
