@extends('teacher.layout.adminlte')

@section('title', 'Create Assignment')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add Assignment</h4>
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
            <form action="{{ route('teacher.assignments.store') }}" method="POST" id="assignmentForm">
                @csrf

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Assignment Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                    <div class="invalid-feedback">Please enter a title.</div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Assignment Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    <div class="invalid-feedback">Please enter a description.</div>
                </div>

                <!-- Select Course -->
<div class="form-group">
    <label for="course_id">Select Course</label>
    <select name="course_id" id="course_id" class="form-control" required>
        <option value="" disabled selected>Select a course</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">Please select a course.</div>
</div>

<!-- Assign to Multiple Students (Filtered Based on Course) -->
<div class="form-group">
    <label for="students">Assign to Students</label>
    <div id="students-list">
        @foreach($students as $student)
            <div class="form-check student-option" data-course="{{ $student->course_id }}">
                <input class="form-check-input student-checkbox" type="checkbox" name="student_id[]" value="{{ $student->student_id }}" id="student_{{ $student->id }}">
                <label class="form-check-label" for="student_{{ $student->id }}">
                    {{ $student->name }} (ID: {{ $student->student_id }})
                </label>
            </div>
        @endforeach
    </div>
    <div class="invalid-feedback">Please select at least one student.</div>
</div>

                <!-- Assignment Questions (Dynamic Input) -->
                <div class="form-group">
                    <label for="questions">Assignment Questions</label>
                    <div id="questions-container">
                        <div class="input-group mb-2 question-item">
                            <input type="text" name="questions[]" class="form-control question-input" placeholder="Enter question" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-question" style="display: none;">X</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-question" class="btn btn-secondary mt-2">Add Question</button>
                </div>

                <!-- Deadline -->
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" id="deadline" class="form-control" required>
                    <div class="invalid-feedback">Please select a valid deadline.</div>
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
    </div>
</div>
@endsection

@push('js')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const courseSelect = document.getElementById("course_id");
    const studentList = document.getElementById("students-list"); // Div containing checkboxes
    const studentCheckboxes = document.querySelectorAll(".student-option");
    const deadlineInput = document.getElementById("deadline");
    const questionsContainer = document.getElementById("questions-container");
    const addQuestionBtn = document.getElementById("add-question");
    const assignmentForm = document.getElementById("assignmentForm");

    // Initially hide all student checkboxes until a course is selected
    studentList.style.display = "none";
    studentCheckboxes.forEach(option => option.style.display = "none");

    // Set minimum date for deadline
    let today = new Date().toISOString().split("T")[0];
    if (deadlineInput) {
        deadlineInput.setAttribute("min", today);
    }

    // Show students only when a course is selected
    courseSelect.addEventListener("change", function () {
        let selectedCourse = this.value;

        // Hide all students first
        studentCheckboxes.forEach(option => {
            option.style.display = "none";
            option.querySelector(".student-checkbox").checked = false; // Uncheck hidden students
        });

        // Show only relevant students
        if (selectedCourse) {
            studentList.style.display = "block"; // Show list container
            studentCheckboxes.forEach(option => {
                if (option.dataset.course === selectedCourse) {
                    option.style.display = "block";
                }
            });
        } else {
            studentList.style.display = "none";
        }
    });

    // Dynamically add new question fields
    addQuestionBtn.addEventListener("click", function () {
        let newInputGroup = document.createElement("div");
        newInputGroup.classList.add("input-group", "mb-2", "question-item");

        newInputGroup.innerHTML = `
            <input type="text" name="questions[]" class="form-control question-input" placeholder="Enter question" required>
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-question">X</button>
            </div>
        `;

        questionsContainer.appendChild(newInputGroup);
    });

    // Remove a question field dynamically
    questionsContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-question")) {
            event.target.closest(".question-item").remove();
        }
    });

    // Form validation before submission
    assignmentForm.addEventListener("submit", function (event) {
        let isValid = true;

        // Validate required inputs
        document.querySelectorAll(".form-control").forEach(input => {
            if (!input.value.trim()) {
                input.classList.add("is-invalid");
                isValid = false;
            } else {
                input.classList.remove("is-invalid");
            }
        });

        // Ensure at least one student is selected
        let selectedStudents = document.querySelectorAll(".student-checkbox:checked").length;
        if (selectedStudents === 0) {
            studentList.classList.add("is-invalid");
            isValid = false;
        } else {
            studentList.classList.remove("is-invalid");
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});
</script>

@endpush
