@extends('teacher.layout.adminlte')

@section('title', 'Create Assignment')

@section('content')
<div class="container">
    <h2 class="mb-4">Add Assignment</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('teacher.assignments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="form-group">
            <label for="title">Assignment Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Assignment Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

       <!-- Course Selection -->
<div class="form-group">
    <label for="course_id">Select Course</label>
    <select name="course_id" id="course_id" class="form-control" required>
        <option value="" disabled selected>Choose a course</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
        @endforeach
    </select>
</div>

<!-- Assign to a Student (Filtered Based on Course) -->
<div class="form-group">
    <label for="student_id">Assign to Student</label>
    <select name="student_id" id="student_id" class="form-control" required>
        <option value="" disabled selected>Select a student</option>
        @foreach($students as $student)
            <option value="{{ $student->student_id }}" data-course="{{ $student->course_id }}">
                {{ $student->name }} (ID: {{ $student->student_id }})
            </option>
        @endforeach
    </select>
</div>

        <!-- File Upload -->
        <div class="form-group">
            <label for="file">Upload File (Optional)</label>
            <input type="file" name="file" class="form-control">
        </div>

        <!-- Deadline -->
        <div class="form-group">
            <label for="due_date">Deadline</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Assignment Status</label>
            <select name="status" class="form-control">
                <option value="active" selected>Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Assignment</button>
    </form>
</div>
@endsection
@push('js')
<script>
document.addEventListener("DOMContentLoaded", function () {
    let courseSelect = document.getElementById("course_id");
    let studentSelect = document.getElementById("student_id");

    courseSelect.addEventListener("change", function () {
        let selectedCourse = this.value;

        // Show only students who belong to the selected course
        for (let option of studentSelect.options) {
            if (option.dataset.course == selectedCourse || option.value === "") {
                option.hidden = false;
            } else {
                option.hidden = true;
            }
        }
    });
});
</script>
@endpush