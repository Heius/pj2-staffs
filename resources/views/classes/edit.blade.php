@extends('layouts.app')
@section('main-content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('class.update',$class->cId) }}">
            @method("PUT")
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Add Class
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Tên lớp" value="{{ $class->cName }}">
                    <input type="number" name="course" class="form-control" placeholder="Khoá" value="{{ $class->course }}">
                    <select name="major" class="form-control" placeholder="Ngành">
                        @foreach ($majors as $major)
                        <option value="{{ $major->mId}}" @if($major->mId == $class->cMajor) selected @endif >{{ $major->mName }}</option>
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-fill btn-info">Submit</button>
            </div>
        </form>
    </div>
@endsection