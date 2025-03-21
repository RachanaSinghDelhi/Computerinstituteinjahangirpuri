@extends('teacher.layout.adminlte')

@section('title', 'Edit Assignment')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Assignment</h4>
        </div>
        <div class="card-body">
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('teacher.assignments.update', $assignment->id) }}" method="POST" id="editAssignmentForm">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Assignment Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $assignment->title }}" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Assignment Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $assignment->description }}</textarea>
                </div>

                <!-- Select Course -->
                <div class="form-group">
                    <label for="course_id">Select Course</label>
                    <select name="course_id" id="course_id" class="form-control" required>
                        <option value="" disabled>Select a course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ $assignment->course_id == $course->id ? 'selected' : '' }}>{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>

               <!-- Assign to Multiple Students (Filtered Based on Course) -->
<div class="form-group">
    <label for="students">Assign to Students</label>
    <div id="students-list">
        @foreach($students as $student)
            <div class="form-check student-option" data-course="{{ $student->course_id }}">
                <input class="form-check-input student-checkbox" 
                    type="checkbox" 
                    name="student_id[]" 
                    value="{{ $student->student_id }}" 
                    id="student_{{ $student->student_id }}"
                    @if(in_array($student->student_id, $assigned_students)) checked @endif>
                <label class="form-check-label" for="student_{{ $student->student_id }}">
                    {{ $student->name }} (ID: {{ $student->student_id }})
                </label>
            </div>
        @endforeach
    </div>
    <div class="invalid-feedback">Please select at least one student.</div>
</div>

                <!-- Assignment Questions -->
                <div class="form-group">
    <label for="questions">Assignment Questions</label>
    <div id="questions-container">
        @foreach (json_decode($assignment->questions, true) ?? [] as $question)
            <div class="input-group mb-2 question-item">
                <input type="text" name="questions[]" class="form-control" value="{{ $question }}" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-question">X</button>
                </div>
            </div>
        @endforeach
    </div>
    <button type="button" id="add-question" class="btn btn-secondary mt-2">Add Question</button>
</div>


                <!-- Deadline -->
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $assignment->deadline }}" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Assignment Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $assignment->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $assignment->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update Assignment</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const courseSelect = document.getElementById("course_id");
    const studentList = document.getElementById("students-list");
    const studentCheckboxes = document.querySelectorAll(".student-option");
    const questionsContainer = document.getElementById("questions-container");
    const addQuestionBtn = document.getElementById("add-question");
    
    studentCheckboxes.forEach(option => option.style.display = "none");
    if (courseSelect.value) {
        studentCheckboxes.forEach(option => {
            if (option.dataset.course === courseSelect.value) {
                option.style.display = "block";
            }
        });
    }

    courseSelect.addEventListener("change", function () {
        let selectedCourse = this.value;
        studentCheckboxes.forEach(option => {
            option.style.display = "none";
            option.querySelector(".student-checkbox").checked = false;
        });
        if (selectedCourse) {
            studentCheckboxes.forEach(option => {
                if (option.dataset.course === selectedCourse) {
                    option.style.display = "block";
                }
            });
        }
    });

    addQuestionBtn.addEventListener("click", function () {
        let newInputGroup = document.createElement("div");
        newInputGroup.classList.add("input-group", "mb-2", "question-item");

        newInputGroup.innerHTML = `
            <input type="text" name="questions[]" class="form-control" placeholder="Enter question" required>
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-question">X</button>
            </div>
        `;
        questionsContainer.appendChild(newInputGroup);
    });

    questionsContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-question")) {
            event.target.closest(".question-item").remove();
        }
    });
});
</script>
@endpush
