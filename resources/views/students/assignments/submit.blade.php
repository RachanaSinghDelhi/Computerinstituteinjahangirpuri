@extends('students.layout.adminlte')
@section('title', 'Payment Details')

@section('content')

<div class="container">
    <h2>Submit Assignment</h2>
    <p><strong>Title:</strong> {{ $assignment->title }}</p>
    <p><strong>Description:</strong> {{ $assignment->description }}</p>
    <p><strong>Deadline:</strong> {{ $assignment->deadline }}</p>

    <form action="{{ route('student.assignments.store', $assignment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Upload Assignment (PDF/DOC)</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection