@extends('layouts.app')
@section('main-content')
    <div class="text-right">
        <a href="{{ route('class.create') }}" class="btn btn-danger btn-fill"><i class="ti-plus"></i></a>
    </div>
    <br>
    <div class="card">
        {{$staff->sPer}}
    </div>

@endsection