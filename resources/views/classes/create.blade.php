@extends('layouts.app')
@section('main-content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('class.store') }}">
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Add Class
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>New Class</label>
                    <input type="text" name="name" class="form-control" placeholder="Class's Name">
                    <input type="number" name="course" class="form-control" placeholder="Course">
                    <select name="major" class="form-control" placeholder="Ngành">
                        @foreach ($majors as $major)
                        <option value="{{ $major->mId}}">{{ $major->mName }}</option>
                        @endforeach
                    </select>
                    @if (Session::exists('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error.message')}}
                    </div>
                    @endif
                <div class="card-content text-center">
                    <button class="btn btn-danger btn-fill btn-wd">Update</button>
                </div>
        </form>
    </div>
@endsection