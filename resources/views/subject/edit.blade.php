@extends('layouts.app')
@section('main-content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('subject.update',$subject->SubId) }}">
            @method("PUT")
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Thêm môn học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Thêm môn</label>
                    <input type="text" name="name" class="form-control" placeholder="Subject's Name" value="{{$subject->SubName}}">
                    <input type="number" name="duration" class="form-control" placeholder="Duration" value="{{$subject->Duration}}">
                    <br>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Final Test</label>
                        <div class="col-sm-10">
                        <div class="radio radio-inline">
                        <input type="radio" id="radio1" name="final"  value="1" @if($subject->Final == 1) checked @endif>
                        <label for="radio1">                        Yes
                        </label>
                        </div>
                        <div class="radio  radio-inline">
                        <input type="radio" id="radio2" name="final"  value="0" @if($subject->Final == 0) checked @endif>
                        <label for="radio2">                        No
                        </label>
                        </div>
                        </div>
                        </div>
                    <span>
                        <input type="number" name="ftd" class="form-control" placeholder="Final Test Duration" value={{$subject->FTD}}>
                    </span>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Skill Test</label>
                        <div class="col-sm-10">
                        <div class="radio  radio-inline">
                        <input type="radio" id="radio3" name="skill"  value="1" @if($subject->Skill == 1) checked @endif>
                        <label for="radio3">                        Yes
                        </label>
                        </div>
                        <div class="radio  radio-inline">
                        <input type="radio" id="radio4" name="skill"  value="0" @if($subject->Skill == 0) checked @endif>
                        <label for="radio4">                        No
                        </label>
                        </div>
                        </div>
                        </div>
                    <span>
                        <input type="number" name="std" class="form-control" placeholder="Skill Test Duration" value={{$subject->STD}}>
                    </span>

                </div>
                <button type="submit" class="btn btn-fill btn-info">Submit</button>
            </div>
        </form>
    </div>
@endsection