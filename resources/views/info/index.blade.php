@extends('layouts.app')
@section('main-content')
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Your Info</h4>
        </div>

        <div class="card-content">
            <form method="post" action="{{route('info.update',Session::get('sId'))}}">
                @method("PUT")
                @csrf
                @foreach ($info as $info)
                    <div class="form-group">
                        <label>    Name</label>
                        <input type="text" class="form-control" name="name" value="{{$info->sName}}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" value="{{$info->sPassword}}" disabled   >
                        <a href="{{ route('info.cpw')}}">Change</a>
                    </div>
                    <div class="form-group">
                    <label>    Email</label>
                        <input type="email" class="form-control" value="{{$info->sEmail}}" disabled>
                    </div>
                    <div class="form-group">
                    <div>    Phone</div>
                        <input type="text" class="form-control" name="num" value="{{$info->sNum}}">
                    </div>
                @endforeach
                <div class="card-content text-center">
                    <button class="btn btn-danger btn-fill btn-wd">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection