@extends('layouts.app')
@section('main-content')
<div class="card">
    <form method = "post" action = "{{ route('major.update', $majors->mId) }}">
        @method("PUT")
        @csrf       
        <div class ="card-header">
            <h4 class="card-title">
                Edit Major
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label>Edit Major's Name</label>
                <input type="text" name="name" class="form-control" value="@if(Session::exists('error'))
                {{Session::get('error.name')}} @else {{ $majors->mName }}
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
            
    </form>
</div>
@endsection