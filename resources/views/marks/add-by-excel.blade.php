@extends('layouts.app')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Import Mark By Excel</h4>

            <br>
            <br>

            <form action="{{ route('mark.mark-by-excel-process') }}" method="post" enctype="multipart/form-data">
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