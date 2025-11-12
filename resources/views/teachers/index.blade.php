@extends('layout')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Teacher List</h4>
            <a href="{{ route('teachers.create') }}" class="btn btn-success btn-sm">+ Add New</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($teachers->isEmpty())
                <p class="text-muted">No teachers found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.n</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Specialization</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $item)
                            <tr>
                                <td>{{ $loop->iteration + ($teachers->currentPage()-1)*$teachers->perPage() }}</td>
                                <td>
                                    @if($item->photo)
                                        <img src="{{ asset('storage/'.$item->photo) }}" width="50" class="rounded" alt="photo">
                                    @else
                                        <img src="https://via.placeholder.com/50" width="50" class="rounded" alt="no photo">
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>{{ $item->specialization }}</td>
                                <td>
                                    <span class="badge bg-{{ $item->status ? 'success' : 'danger' }}">
                                        {{ $item->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('teachers.show',$item) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('teachers.edit',$item) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('teachers.destroy',$item) }}" method="POST" style="display:inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete this teacher?')" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $teachers->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
