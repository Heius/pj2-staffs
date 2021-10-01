@extends('layouts.app')
@section('main-content')
<div class ="text-center">
    @php $dem = 0; @endphp
    @foreach($marks as $c)
    @if($c->Final == 1 && $c->Skill == 0)
                                @if($c->mFinal1 >=5 )
                                    @php $dem++ @endphp
                                @elseif($c->mFinal1 < 5 && $c->mFinal2 >= 5)
                                    @php $dem++ @endphp
                                @endif
    @elseif($c->Final == 0 && $c->Skill == 1)
                                @if($c->mSkill1 >=5)
                                    @php $dem++ @endphp
                                @elseif($c->mSkill1 < 5 && $c->mSkill2 >= 5)
                                    @php $dem++ @endphp
                                @endif
    @elseif($c->Final == 1 && $c->Skill == 1)
                                @if($c->mFinal1 >=5 && $c->mFinal2 >=5)
                                    @php $dem++ @endphp
                                @elseif($c->mFinal1 >= 5 || $c->mFinal2 >= 5 && $c->mSkill1 >=5 || $c->mSkill2>=5) 
                                    @php $dem++ @endphp
                                @endif
    @endif
    @endforeach
    <h4>@foreach($marks as $name)@if($loop->first){{$name->SubName}}@endif @endforeach</h4>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><h4>@foreach($marks as $name)@if($loop->first){{$name->cName}}@endif @endforeach</h4></h4>


        <div class="progress" title ="{{number_format( $dem/$all * 100, 2 )}}% Passed
{{$dem}}/{{$all}}">
	                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{number_format( $dem/$all * 100, 2 )}}" aria-valuemin="0" aria-valuemax="100" style="width: {{number_format( $dem/$all * 100, 2 )}}%;">
	                                        <span class="sr-only"></span>
	                                    </div>
	                                </div>
    </div>
<div class="card-content table-responsive table-full-width">
    <table class="table table-hover">
        @foreach($marks as $table)@if($loop->first)@if($table->Final == 1 && $table->Skill == 0) @php $d = 1; @endphp @elseif($table->Final == 0 && $table->Skill == 1) @php $d=2; @endphp @else @php $d=3; @endphp @endif @endif @endforeach
        @if($d == 1)
        <thead>
            <th>Name</th>
            <th>Code</th>
            <th>Theory</th>
            <th>Theory2</th>
            {{-- <th>Skill1</th>
            <th>Skill2</th> --}}
        </thead>
        <tbody>
            {{-- @php
                foreach ($marks as $each){
                    print_r($each);
                    echo("<br>");
                }
            @endphp --}}
            @foreach ($marks as $mark)
                <tr @if ($mark->StStatus==0) class="warning" @endif>
                    <td >{{ $mark->StName }}</td>
                    <td>{{$mark->StCode}}</td>
                    <td @if($mark->mFinal1 <5) ? style=color:red @endif >@if($mark->Final == 1) {{ $mark->mFinal1 }} @else <i class="ti-na"></i> @endif</td>
                    <td @if($mark->mFinal2 <5) ? style=color:red @endif >@if($mark->Final == 1) {{ $mark->mFinal2 }} @else <i class="ti-na"></i> @endif</td>
                    {{-- <td @if($mark->mSkill1 <5) ? style=color:red @endif >@if($mark->Skill == 1) {{ $mark->mSkill1 }} @else <i class="ti-na"></i> @endif</td>
                    <td @if($mark->mSkill2 <5) ? style=color:red @endif>@if($mark->Skill == 1){{ $mark->mSkill2 }} @else <i class="ti-na"></i>@endif</td> --}}
                    <td><a class="btn btn-info" href="{{route('mark.changeMark',['idSub'=>$mark->mSubject,'idSt'=>$mark->mStudent])}}"><i class="ti-pencil"></i></a></td>
                </tr>
                
            
            @endforeach
            @elseif($d == 2)
        <thead>
            <th>Name</th>
            <th>Code</th>
            {{-- <th>Theory</th>
            <th>Theory2</th> --}}
            <th>Skill1</th>
            <th>Skill2</th>
        </thead>
        <tbody>
            {{-- @php
                foreach ($marks as $each){
                    print_r($each);
                    echo("<br>");
                }
            @endphp --}}
            @foreach ($marks as $mark)
                <tr @if ($mark->StStatus==0) class="warning" @endif>
                    <td >{{ $mark->StName }}</td>
                    <td>{{$mark->StCode}}</td>
                    {{-- <td @if($mark->mFinal1 <5) ? style=color:red @endif >@if($mark->Final == 1) {{ $mark->mFinal1 }} @else <i class="ti-na"></i> @endif</td>
                    <td @if($mark->mFinal2 <5) ? style=color:red @endif >@if($mark->Final == 1) {{ $mark->mFinal2 }} @else <i class="ti-na"></i> @endif</td> --}}
                    <td @if($mark->mSkill1 <5) ? style=color:red @endif >@if($mark->Skill == 1) {{ $mark->mSkill1 }} @else <i class="ti-na"></i> @endif</td>
                    <td @if($mark->mSkill2 <5) ? style=color:red @endif>@if($mark->Skill == 1){{ $mark->mSkill2 }} @else <i class="ti-na"></i>@endif</td>
                    <td><a class="btn btn-info" href="{{route('mark.changeMark',['idSub'=>$mark->mSubject,'idSt'=>$mark->mStudent])}}"><i class="ti-pencil"></i></a></td>
                </tr>
                
            
            @endforeach
            @elseif($d==3)
            <thead>
                <th>Name</th>
                <th>Code</th>
                <th>Theory</th>
                <th>Theory2</th>
                <th>Skill1</th>
                <th>Skill2</th>
            </thead>
            <tbody>
                {{-- @php
                    foreach ($marks as $each){
                        print_r($each);
                        echo("<br>");
                    }
                @endphp --}}
                @foreach ($marks as $mark)
                    <tr @if ($mark->StStatus==0) class="warning" @endif>
                        <td >{{ $mark->StName }}</td>
                        <td>{{$mark->StCode}}</td>
                        <td @if($mark->mFinal1 <5) ? style=color:red @endif >@if($mark->Final == 1) {{ $mark->mFinal1 }} @else <i class="ti-na"></i> @endif</td>
                        <td @if($mark->mFinal2 <5) ? style=color:red @endif >@if($mark->Final == 1) {{ $mark->mFinal2 }} @else <i class="ti-na"></i> @endif</td>
                        <td @if($mark->mSkill1 <5) ? style=color:red @endif >@if($mark->Skill == 1) {{ $mark->mSkill1 }} @else <i class="ti-na"></i> @endif</td>
                        <td @if($mark->mSkill2 <5) ? style=color:red @endif>@if($mark->Skill == 1){{ $mark->mSkill2 }} @else <i class="ti-na"></i>@endif</td>
                        <td><a class="btn btn-info" href="{{route('mark.changeMark',['idSub'=>$mark->mSubject,'idSt'=>$mark->mStudent])}}"><i class="ti-pencil"></i></a></td>
                @endforeach
            @endif
        </tbody>
    </table>
    {{-- <div class="text-center">
        {{ $majors->appends(['search' => $search])->links() }}
    </div> --}}
</div>
</div>
@endsection