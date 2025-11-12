@extends('layout')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Edit Student</h4>
            <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="card-body">
            <form action="{{ url('students/' . $students->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <input type="hidden" name="id" value="{{ $students->id }}">

                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Name</strong></label>
                    <input type="text" name="name" id="name" class="form-control" 
                           value="{{ old('name', $students->name) }}" placeholder="Enter student name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label"><strong>Address</strong></label>
                    <input type="text" name="address" id="address" class="form-control" 
                           value="{{ old('address', $students->address) }}" placeholder="Enter address">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label"><strong>Mobile</strong></label>
                    <input type="text" name="mobile" id="mobile" class="form-control" 
                           value="{{ old('mobile', $students->mobile) }}" placeholder="Enter mobile number">
                    @error('mobile')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
