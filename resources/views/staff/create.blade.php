@extends('layouts.app')
@section('main-content')
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Employee</h4>
        </div>

        <div class="card-content table-responsive table-full-width">

            {{-- <div class="text-center">
                {{ $classes->appends(['search' => $search])->links() }}
            </div> --}}
            <form method="post" action="{{route('staff.store')}}">
                @csrf
                <div class="card-content">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" class="form-control" pattern="[0-9]{10}" required>
                        <div class="card-content text-center">
                            <button type="submit" class="btn btn-fill btn-info">Submit</button>
                            </div>
            </form>
        </div>
    </div>

@endsection