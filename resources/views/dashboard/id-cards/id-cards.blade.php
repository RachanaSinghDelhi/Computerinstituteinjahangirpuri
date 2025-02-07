@extends('dashboard.app')
@section('title', 'Student ID Cards')
@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Student ID Cards</h2>
    
    <!-- Search Box -->
    <input type="text" id="searchBox" class="form-control mb-3" placeholder="Search for students...">

    <!-- Form for selecting and downloading ID cards -->
    <form action="{{ route('students.downloadSelectedIdCards') }}" method="POST">
        @csrf
        <div class="row" id="studentList">
            @foreach($students as $student)
                <div class="col-md-6 mb-3 student-item">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selected_ids[]" value="{{ $student->student_id }}" id="student-{{ $student->student_id }}">
                        <label class="form-check-label" for="student-{{ $student->student_id }}">
                            <strong>{{ $student->name }}</strong> 
                            (ID: {{ $student->student_id }}, Course: {{ $student->course->course_title ?? 'N/A' }})
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Display error message if no IDs are selected -->
        @if($errors->has('selected_ids'))
            <div class="alert alert-danger">
                {{ $errors->first('selected_ids') }}
            </div>
        @endif

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary mt-3">Download Selected ID Cards</button>
    </form>

    <!-- Success/Error Messages -->
    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif

    <!-- Pagination -->
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>

<div class="container">
    {{ $students->links() }}
</div>

<script>
    document.getElementById('searchBox').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let studentItems = document.querySelectorAll('.student-item');
        
        studentItems.forEach(function (item) {
            let text = item.textContent.toLowerCase();
            if (text.includes(filter)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endsection
