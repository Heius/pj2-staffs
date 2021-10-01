@extends('layouts.app')
@section('main-content')
    <div class="text-right">
        <a href="{{ route('subject.create') }}" class="btn btn-danger btn-fill "><i class="ti-plus"></i></a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Subject List</h4>
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
                    <th>Duration</th>
                    <th>Theory Test</th>
                    <th>Theory Test Duration</th>
                    <th>Skill Test</th>
                    <th>Skill Test Duration</th>
                    <th>Info</th>
                    <th>Edit</th>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td><label>{{ $subject->SubName }}</label></td>
                            <td>{{ $subject->Duration}} hour</td>
                            <td>@if($subject->Final == 0) <i class="ti-na"></i> @else <i class="ti-check">@endif</td>
                            <td>@if($subject->Final == 0) --- @else{{$subject->FTD}} min @endif</td>
                            <td>@if($subject->Skill == 0) <i class="ti-na"></i> @else <i class="ti-check">@endif</td>
                                <td>@if($subject->Skill == 0) --- @else{{$subject->STD}} min @endif</td>
                            <td><a class="btn btn-primary btn-sm"
                                href="{{ route('mark.index',['subject'=> $subject->SubId]) }}"><i class="ti-info"></i></a></td>
                        <td><a class="btn btn-warning btn-sm"
                                href="{{ route('subject.edit', $subject->SubId) }}"><i class="ti-pencil"></i></a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {{ $subjects->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>

@endsection