@extends('layout')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Teacher Details</h4>
            <div>
                <a href="{{ route('teachers.edit',$teacher) }}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ route('teachers.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    @if($teacher->photo)
                        <img src="{{ asset('storage/'.$teacher->photo) }}" width="160" class="rounded-circle">
                    @else
                        <img src="https://via.placeholder.com/160" class="rounded-circle">
                    @endif
                </div>
                <div class="col-md-9">
                    <h4>{{ $teacher->name }}</h4>
                    <p><strong>Email:</strong> {{ $teacher->email ?? '—' }}</p>
                    <p><strong>Mobile:</strong> {{ $teacher->mobile ?? '—' }}</p>
                    <p><strong>Specialization:</strong> {{ $teacher->specialization ?? '—' }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-{{ $teacher->status ? 'success' : 'danger' }}">{{ $teacher->status ? 'Active' : 'Inactive' }}</span></p>
                    <p><strong>Address:</strong><br>{{ $teacher->address ?? '—' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
