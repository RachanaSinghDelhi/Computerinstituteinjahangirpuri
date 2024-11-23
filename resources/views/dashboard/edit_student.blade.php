@extends('dashboard.app')
@section('title', 'Edit Student')
@section('content')
<div class="container mt-4">
    <h2>Edit Student</h2>

    <!-- Form for editing a student -->
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Student ID (Read-Only) -->
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $student->student_id }}" readonly>
        </div>

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
        </div>

        <!-- Father's Name -->
        <div class="mb-3">
            <label for="father_name" class="form-label">Father's Name</label>
            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ $student->father_name }}" required>
        </div>

        <!-- Date of Admission -->
        <div class="mb-3">
            <label for="doa" class="form-label">Date of Admission</label>
            <input type="date" class="form-control" id="doa" name="doa" value="{{ $student->doa }}" required>
        </div>

        <!-- Course -->
        <div class="mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select class="form-control" id="course_id" name="course_id">
                <option value="" {{ is_null($student->course_id) ? 'selected' : '' }}>No Course Selected</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->course_title }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Batch -->
        <div class="mb-3">
            <label for="batch" class="form-label">Batch</label>
            <input type="text" class="form-control" id="batch" name="batch" value="{{ $student->batch }}" required>
        </div>

        <!-- Photo -->
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            @if($student->photo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" width="100">
                </div>
            @endif
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update Student</button>
    </form>
</div>
@endsection
