@extends('students.layout.adminlte')
@section('title', 'Assignments')

@section('content')
<div class="container mt-4">
    <h2>{{ $assignment->title }}</h2>
    <p><strong>Course:</strong> {{ $assignment->course->name }}</p>
    <p><strong>Description:</strong> {{ $assignment->description }}</p>
    <p><strong>Deadline:</strong> {{ date('d M, Y', strtotime($assignment->deadline)) }}</p>

    <h4 class="mt-4">Questions</h4>
    <form action="{{ route('student.assignments.submit', $assignment->id) }}" method="POST">
        @csrf
        @foreach ($questions as $index => $question)
            <div class="mb-3">
                <label class="form-label"><strong>Q{{ $index + 1 }}:</strong> {{ $question }}</label>
                <textarea name="answers[]" class="form-control" required></textarea>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Submit Answers</button>
    </form>
</div>
@endsection
