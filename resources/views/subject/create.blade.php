@extends('layouts.app')
@section('main-content')
<div class=" card-header">
    <h4 class="card-title">
        Add Subject
    </h4>
</div>
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form id="myform" name="myform" method="post" action="{{ route('subject.store') }}">
            @csrf

            <div class="card-content">
                <div class="form-group">
                    <label>New Subject</label>

                    <input type="text" name="name" class="form-control" placeholder="Subject's Name">
                    <div class="input-group">
                    <input type="number" name="duration" class="form-control" placeholder="Duration">
                    <span class=input-group-addon>hour</span>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label">Final Test</label>
                    <div class="col-sm-10">
                    <div class="radio radio-inline">
                    <input type="radio" id="radio1" name="final"  value="1">
                    <label for="radio1">                        Yes
                    </label>
                    </div>
                    <div class="radio radio-inline">
                    <input type="radio" id="radio2" name="final"  value="0" checked="checked">
                    <label for="radio2">                        No
                    </label>
                    </div>
                    </div>
                    </div>

                    <span>
                        <div class="input-group">
                        <input type="number" name="ftd" class="form-control" placeholder="Final Test Duration">
                        <span class=input-group-addon>min</span>
                        </div>
                    </span>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Skill Test</label>
                        <div class="col-sm-10">
                        <div class="radio radio-inline">
                        <input type="radio" id="radio3" name="skill"  value="1">
                        <label for="radio3">                        Yes
                        </label>
                        </div>
                        <div class="radio radio-inline">
                        <input type="radio" id="radio4" name="skill"  value="0" checked="checked">
                        <label for="radio4">                        No
                        </label>
                        </div>
                        </div>
                        </div>
                    <span>
                        <div class="input-group">
                        <input type="number" name="std" class="form-control" placeholder="Skill Test Duration">
                        <span class=input-group-addon>min</span>
                        </div>
                    </span>

                </div>
                <div class="card-content text-center">
                <button type="submit" class="btn btn-fill btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('head')
<script src="{{ asset('assets') }}/js/testing.js"></script>
@endpush