@extends('layouts.app')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Import Students by Excel</h4>


            <form action="{{ route('student.add-by-excel-process') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="excel-file" class="form-control"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    @if (Session::exists('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error.message')}}
                    </div>
                    @endif
                    <div class="card-content text-center">
                        <button type="submit" class="btn btn-fill btn-info">Submit</button>
                        </div>
            </form>
            <br>
        </div>
    </div>

@endsection