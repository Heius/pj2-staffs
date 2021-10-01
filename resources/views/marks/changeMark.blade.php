@extends('layouts.app')
@section('main-content')
<div class="card">
    @foreach($marks as $r)
    <form method = "post" action = "{{route('mark.changeMarkProc',['idSub'=>$r->mSubject,'idSt'=>$r->mStudent])}}">
        @csrf       
        @endforeach
        <div class ="card-header">
            <h4 class="card-title">
                Edit Mark
            </h4>
        </div>
        <div class="card-content">
            @foreach($marks as $mark)
            <div class="form-group">
                <label>Student's Name</label>
                <input type="text" name="name" class="form-control" value="{{ $mark->StName }}" disabled>
            </div>
            <div class="form-group">
                <label>Subject's Name</label>
                <input type="text" name="name" class="form-control" value="{{ $mark->SubName }}" disabled>
            </div>
            <div class="form-group">
                <label>Theory Test 1</label>
                <input type="number" name="tt1" class="form-control" value="{{ $mark->mFinal1 }}" @if($mark->Final == 0) disabled @endif>
            </div>
            <div class="form-group">
                <label>Theory Test 2</label>
                <input type="number" name="tt2" class="form-control" value="{{ $mark->mFinal2 }}" @if($mark->Final == 0) disabled @endif>
            </div>
            <div class="form-group">
                <label>Skill Test 1</label>
                <input type="number" name="st1" class="form-control" value="{{ $mark->mSkill1 }}" @if($mark->Skill == 0) disabled @endif>
            </div>
            <div class="form-group">
                <label>Skill Test 2</label>
                <input type="number" name="st2" class="form-control" value="{{ $mark->mSkill2 }}" @if($mark->Skill == 0) disabled @endif>
            </div>
            <div class="card-content text-center">
                <button type="submit" class="btn btn-fill btn-info">Submit</button>
                </div>
            @endforeach
        </div>
    </form>
            
    </form>
</div>
@endsection