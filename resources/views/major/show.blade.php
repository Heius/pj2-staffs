@extends('layouts.app')
@section('main-content')
    <div class="text-right">
        <a href="{{ route('major.create') }}" class="btn btn-danger btn-fill"><i class="ti-plus"></i></a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">@foreach($realmName as $name){{$name->mName}}@endforeach</h4>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>Class</th>
                    <th>Info</th>
                </thead>
                @foreach($majors as $major)
                <tr>
                    <td>{{$major->cName }}</td>
                    <td><a class="btn btn-primary btn-sm"
                        href="{{ route('student.index',['class'=>$major->cId]) }}"><i class="ti-info"></i></a></td>
                </tr>
                @endforeach
            </table>

            {{-- <div class="text-center">
                {{ $majors->appends()->links() }}
            </div> --}}
        </div>
    </div>

@endsection