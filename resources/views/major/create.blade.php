@extends('layouts.app')
@section('main-content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('major.store') }}">
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Add Major
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>New Major</label>
                    <input type="text" name="name" class="form-control" value="@if(Session::exists('error'))
                    {{Session::get('error.name')}}
                @endif">
                    @if (Session::exists('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error.message')}}
                    </div>
                    @endif
                    <div class="card-content text-center">
                        <button type="submit" class="btn btn-fill btn-info">Submit</button>
                        </div>
        </form>
    </div>
@endsection