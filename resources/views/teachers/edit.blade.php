@extends('layout')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header"><h4>Edit Teacher</h4></div>
        <div class="card-body">
            <form action="{{ route('teachers.update',$teacher) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name',$teacher->name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email',$teacher->email) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control" value="{{ old('mobile',$teacher->mobile) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Specialization</label>
                        <input type="text" name="specialization" class="form-control" value="{{ old('specialization',$teacher->specialization) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control">
                        @if($teacher->photo)
                            <img src="{{ asset('storage/'.$teacher->photo) }}" width="100" class="rounded mt-2" alt="photo">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $teacher->status ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$teacher->status ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="3">{{ old('address',$teacher->address) }}</textarea>
                    </div>
                </div>

                <div class="mt-3 text-end">
                    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
