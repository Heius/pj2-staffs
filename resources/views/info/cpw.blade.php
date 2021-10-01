@extends('layouts.app')
@section('main-content')
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Your Info</h4>
        </div>

        <div class="card-content">
            <form method="post" action="{{ route('info.cpwp')}}">
                @csrf
            <div class="form-group">
                <label class="control-label">
                    Current Password<star>*</star>
                </label>
                <input type="password" name ="op" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">
                    New Password<star>*</star>
                </label>
                <input type="password" name ="np" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">
                    Confirm Password<star>*</star>
                </label>
                <input type="password" name ="cnp" class="form-control">
            </div>
            <div class="form-group">
            <span>
                @if (Session::exists('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error.message')}}
                </div>
                @endif
            </span>
            </div>
            <div class="card-content text-center">
                <button class="btn btn-danger btn-fill btn-wd">Update</button>
            </div>
            </form>
        </div>
    </div>

@endsection