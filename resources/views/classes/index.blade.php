@extends('layouts.app')
@section('main-content')
    <div class="text-right">
        <a href="{{ route('class.create') }}" class="btn btn-danger btn-fill"><i class="ti-plus"></i></a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Class List</h4>
            <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" value="{{ $search }}" name="search" class="form-control"
                        placeholder="Search...">
                </div>
            </form>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>Info</th>
                    <th>Edit</th>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{ $class->cName}}</td>
                            <td>{{ $class->course}}</td>
                            <td>{{ $class->mName }}</td>
                            <td><a class="btn btn-primary btn-sm"
                                href="{{ route('student.index',['class'=>$class->cId]) }}"><i class="ti-info"></i></a></td>
                        <td><a class="btn btn-warning btn-sm"
                                href="{{ route('class.edit', $class->cId) }}"><i class="ti-pencil"></i></a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {{ $classes->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>

@endsection