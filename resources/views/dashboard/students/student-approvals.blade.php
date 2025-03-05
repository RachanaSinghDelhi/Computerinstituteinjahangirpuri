@extends('dashboard.layout.adminlte')

@section('content')
<div class="container">
    <h2>Pending Student Updates</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        @foreach($pendingUpdates as $update)
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Update Request for Student ID: {{ $update->student_id }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Previous Data Column -->
                            <div class="col-md-6">
                                <h6 class="text-muted">Previous Details</h6>
                                @php $oldData = json_decode($update->old_data, true); @endphp
                                <ul class="list-group mb-3">
                                    @if ($oldData)
                                        @foreach ($oldData as $key => $value)
                                            <li class="list-group-item">
                                                <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> 
                                                {{ $value ?? 'N/A' }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item">No previous data available</li>
                                    @endif
                                </ul>
                            </div>

                            <!-- Updated Data Column -->
                            <div class="col-md-6">
                                <h6 class="text-muted">Updated Details</h6>
                                @php $newData = json_decode($update->new_data, true); @endphp
                                <ul class="list-group mb-3">
                                    @foreach ($newData as $key => $value)
                                        <li class="list-group-item">
                                            <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> 
                                            {{ $value ?? 'N/A' }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Updated By Section -->
                        <p class="mb-2">
                            <strong>Updated By:</strong> 
                            {{ $update->user->name ?? 'Unknown' }} 
                            @if(isset($update->user->role))
                                ({{ ucfirst($update->user->role) }})
                            @endif
                        </p>

                        <div class="d-flex">
                            <form action="{{ route('super_admin.student-approve', $update->id) }}" method="POST" class="me-2">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('super_admin.student-reject', $update->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </div>
                    </div> <!-- End of Card Body -->
                </div> <!-- End of Card -->
            </div> <!-- End of Col -->
        @endforeach
    </div> <!-- End of Row -->
</div> <!-- End of Container -->
@endsection
