@extends('layout')
@section('content')

    <div class="card">
        <div class="card-header">Teachers Page</div>
        <div class="card-body">

            <form action="{{ url('teachers') }}" method="post">
                {!! csrf_field() !!}
                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
                </br>
                <label>Address</label></br>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                @error('address')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
                </br>
                <label>Mobile</label></br>
                <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile') }}">
                @error('mobile')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
                </br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
