@extends('layouts.app')
@section('main-content')
    <div class="text-right">
        <a href="{{ route('staff.create') }}" class="btn btn-danger btn-fill"><i class="ti-plus"></i></a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Employee List</h4>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Reset Password</th>
                    <th>Suspend</th>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr @if ($staff->sPer==2) class="warning" @endif>
                            <td>{{ $staff->sName}}</td>
                            <td>{{ $staff->sEmail }}</td>
                            <td>{{ $staff->sNum }}</td>
                            @if($staff->sPer == 0 || $staff->sPer == 2)
                        <td><a class="btn btn-warning btn-sm"
                                href="{{ route('staff.show', $staff->sId) }}"><i class="ti-key"></i></a></td>
                            @else
                                <td></td>
                        @endif
                                @if($staff->sPer == 0 || $staff->sPer == 2)
                        <td>
                            @if($staff->sPer == 0)
                            <a class="btn btn-danger btn-sm"
                                href="{{route('staff.edit',$staff->sId)}}"></i> <i class="ti-lock"></a></td>
                                @else
                                <a class="btn btn-success btn-sm"
                                href="{{route('staff.edit',$staff->sId)}}"></i> <i class="ti-unlock"></a></td>
                                @endif
                        </td>
                                @else
                        <td></td>
                        @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- <div class="text-center">
                {{ $classes->appends(['search' => $search])->links() }}
            </div> --}}
        </div>
    </div>
@endsection