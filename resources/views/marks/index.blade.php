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
                <li><a href="{{route('mark.mark-by-excel')}}"><i class="ti-import"></i> Import Excel</a></li>
                <li><a href="{{route('mark.newMark')}}"><i class="ti-marker-alt"></i> Manual</a></li>
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
            <h4 class="card-title">Mark List</h4>
            <div class="row">
                <div class="col-xs-4">
            <form method="get" action="">
                <label>Subject</label>
                <table>
                    <td>
                <select name="subject" class="selectpicker" data-style="btn btn-success btn-block" tabindex="-98">
                    <option value="">-----</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->SubId }}" @if ($subject->SubId == $SubId) {{ 'selected' }} @endif>
                            {{ $subject->SubName}}
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
        {{-- @if(get('subject')){ --}}
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>Class</th>
                    <th>Course</th>
                    <th>View</th>
                </thead>
                <tbody>
                    @foreach ($marks as $mark)
                        <tr>
                            <td>{{ $mark->cName }}</td>
                            <td>{{  $mark->course}}</td>
                            <td>
                                <a class="btn btn-success btn-sm"
                                    href="{{route('mark.cminfo',['idSub'=>$mark->mSubject,'idCl'=>$mark->cId])}}"><i class="ti-angle-right"></i> </a></td>
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
        {{-- }
        @else{

        }
        @endif --}}
@endsection