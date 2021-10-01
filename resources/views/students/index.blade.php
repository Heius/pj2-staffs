@extends('layouts.app')
@section('main-content')
<div class="text-right">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="col-sm-8"></div>
    <div class="col-sm-4">
        <div class="dropdown open">
              <a href="#" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="ti-plus"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('student.add-by-excel') }}"><i class="ti-import"></i> Import Excel</a></li>
                <li><a href="{{ asset('upload/file-mau.xlsx') }}" download><i class="ti-import"></i> Download Sample</a></li>
              </ul>
        </div>
    </div>
    </div>
</div>
</div>
<div class="title">

</div>
<br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Student List</h4>
            <div class="row">
                <div class="col-xs-4">
            <form method="get" action="">
                <label>Class</label>
                <table>
                    <td>
                <select name="class" class="selectpicker" data-style="btn btn-success btn-block" tabindex="-98">
                    <option value="">-----</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->cId }}" @if ($class->cId == $idClass) {{ 'selected' }} @endif>
                            {{ $class->cName.'K'.$class->course }}
                        </option>
                    @endforeach
                </select>
                    </td>
                    <td>
                <button class="btn btn-sm btn-danger " ><i class="ti-search"></i></button>
                    </td>
                </table>
            </form>
                </div>
            </div>
            <br>

            {{-- <a href="{{ route('student.add-by-excel') }}" class="btn btn-primary">Thêm bằng excel</a>
            <a href="{{ route('student.download-excel') }}" class="btn btn-primary">Xuất file excel</a> --}}
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DoB</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Mark</th>
                    <th>Suspend</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr @if ($student->StStatus==0) class="warning" @endif>
                            <td>{{ $student->StName }}</td>
                            <td>{{ $student->StEmail }}</td>
                            <td>{{ $student->StDoB }}</td>
                            <td>{{ $student->GenderName }}</td>
                            <td>{{ $student->StNum}}</td>
                            <td><a class="btn btn-info btn-sm" href="{{route('mark.markCheck',['idSt'=>$student->StId])}}"><i class="ti-receipt"></i></a></td>
                            <td>
                                @if($student->StStatus == 1)
                                <a class="btn btn-danger btn-sm"
                                    href="{{route('student.show',$student->StId)}}"></i> <i class="ti-lock"></a></td>
                                    @elseif($student->StStatus == 0)
                                    <a class="btn btn-success btn-sm"
                                    href="{{route('student.show',$student->StId)}}"></i> <i class="ti-unlock"></a></td>
                                    @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- <div class="text-center">
                {{ $majors->appends(['search' => $search])->links() }}
            </div> --}}
        </div>
    </div>

@endsection