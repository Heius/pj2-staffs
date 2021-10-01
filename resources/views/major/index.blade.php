@extends('layouts.app')
@section('main-content')
    <div class="text-right">
        <a href="{{ route('major.create') }}" class="btn btn-danger btn-fill"><i class="ti-plus"></i></a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Major List</h4>
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
                    <th>Info</th>
                    <th>Edit</th>
                </thead>
                <tbody>
                    @foreach ($majors as $major)
                        <tr>
                            <td>{{ $major->mName }}</td>
                            <td><a class="btn btn-primary btn-sm"
                                href="{{ route('major.show', $major->mId) }}"><i class="ti-info"></i></a></td>
                        <td><a class="btn btn-warning btn-sm"
                                href="{{ route('major.edit', $major->mId) }}"><i class="ti-pencil"></i></a></td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {{ $majors->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>

@endsection