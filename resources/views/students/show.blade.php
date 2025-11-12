@extends('layout')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Student Details</h4>
            <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <h5 class="card-title mb-2">
                    <strong>Name:</strong> {{ $students->name }}
                </h5>
            </div>
            <p class="card-text mb-2"><strong>Address:</strong> {{ $students->address }}</p>
            <p class="card-text mb-2"><strong>Mobile:</strong> {{ $students->mobile }}</p>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('students.edit', $students->id) }}" class="btn btn-primary btn-sm">
                <i class="fa fa-pencil"></i> Edit
            </a>

            <form action="{{ route('students.destroy', $students->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Are you sure you want to delete this student?')">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
