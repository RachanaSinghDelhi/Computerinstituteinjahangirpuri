@extends('students.layout.adminlte')
@section('title', 'Assignments')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Your Assignments</h2>

    @if($assignments->isEmpty())
        <div class="alert alert-info">No assignments assigned yet.</div>
    @else
        <div class="row">
            @foreach($assignments as $assignment)
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $assignment->title }}</h5>
                            <p class="card-text"><strong>Course:</strong> {{ $assignment->course->name }}</p>
                            <p class="card-text"><strong>Description:</strong> {{ $assignment->description }}</p>
                            <p class="card-text"><strong>Deadline:</strong> {{ date('d M, Y', strtotime($assignment->deadline)) }}</p>
                            <p class="card-text"><strong>Status:</strong> 
                                <span class="badge {{ $assignment->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($assignment->status) }}
                                </span>
                            </p>
                            <a href="{{ route('student.assignments.show', $assignment->id) }}" class="btn btn-primary">View & Submit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
