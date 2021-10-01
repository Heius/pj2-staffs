@extends('layouts.app')
@section('main-content')
<div class ="text-left">
    <h4>@foreach($am as $name)@if($loop->first){{$name->StName}}@endif @endforeach</h4>
</div>
<div class="card">
    <div class="card-content table-responsive table-full-width">
        <table class="table table-hover table-bordered ">
            <thead>
                @foreach($sn as $sname)
                <th  class="text-center " @if($sname->Final == 1 && $sname->Skill == 0) colspan=2 @elseif($sname->Skill == 1 && $sname->Final == 0) colspan=2 @else colspan = 4 @endif><h4>{{$sname->SubName}}</h4></th>
                @endforeach
            </thead>
            <tr >
                <thead>
                    @foreach($sn as $sname)
                    @if($sname->Final == 1 && $sname->Skill == 0)
                    <th>Theory 1</th>
                    <th>Theory 2</th>
                    @elseif($sname->Skill == 1 && $sname->Final == 0)
                    <th>Skill 1</th>
                    <th>Skill 2</th>
                    @else
                    <th>Theory 1</th>
                    <th>Theory 2</th>
                    <th>Skill 1</th>
                    <th>Skill 2</th>
                    @endif
                    @endforeach
                <thead>
            </tr>
            <tr>
            @foreach($am as $mark)
                @if($mark->Final == 1 && $mark->Skill == 0)
            <td @if($mark->mFinal1 >= 5) style="color:green" @else style="color:red" @endif>@if($mark->mFinal1 == NULL) <i class="ti-na"></i> @else {{$mark->mFinal1}} @endif</td>
            <td @if($mark->mFinal2 >= 5) style="color:green" @else style="color:red" @endif>@if($mark->mFinal2 == NULL) <i class="ti-na"></i> @else {{$mark->mFinal2}} @endif</td>
            @elseif($mark->Final == 0 && $mark->Skill == 1)
            <td @if($mark->mSkill1 >= 5) style="color:green" @else style="color:red" @endif>@if($mark->mSkill1 == NULL) <i class="ti-na"></i> @else {{$mark->mSkill1}} @endif</td>
            <td @if($mark->mSkill2 >= 5) style="color:green" @else style="color:red" @endif>@if($mark->mSkill2 == NULL) <i class="ti-na"></i> @else {{$mark->mSkill2}} @endif</td>
            @else
            <td @if($mark->mFinal1 >= 5) style="color:green" @else style="color:red" @endif>@if($mark->mFinal1 == NULL) <i class="ti-na"></i> @else {{$mark->mFinal1}} @endif</td>
            <td @if($mark->mFinal2 >= 5) style="color:green" @else style="color:red" @endif>@if($mark->mFinal2 == NULL) <i class="ti-na"></i> @else {{$mark->mFinal2}} @endif</td>
            <td @if($mark->mSkill1 >= 5) style="color:green" @else style="color:red" @endif>@if($mark->mSkill1 == NULL) <i class="ti-na"></i> @else {{$mark->mSkill1}} @endif</td>
            <td @if($mark->mSkill2 >= 5) style="color:green" @else style="color:red" @endif>@if($mark->mSkill2 == NULL) <i class="ti-na"></i> @else {{$mark->mSkill2}} @endif</td>
                @endif
            @endforeach
            </tr>
        </table>
    </div>
</div>
@endsection