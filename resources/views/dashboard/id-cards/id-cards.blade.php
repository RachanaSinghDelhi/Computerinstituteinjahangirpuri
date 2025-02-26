@extends('adminlte::page')

@section('title', 'Student ID Cards')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Student ID Cards</h3>
        </div>
        <div class="card-body">
            
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

            <!-- Display all student ID cards -->
            <div class="row" id="studentCards">
                @foreach($students as $student)
                    <div class="col-md-4 mb-4 student-item">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $student->name }}</h5>
                                <p class="card-text">Student ID: {{ $student->student_id }}</p>
                                <p class="card-text">Course: {{ $student->course->course_title ?? 'N/A' }}</p>

                                <!-- ID Card Template -->
                                <div class="id-card position-relative">
                                    <img src="{{ asset('assets/images/id_card.jpg') }}" class="id-bg">
                                    <div class="image">
                                        <img src="{{ asset('storage/students/' . $student->photo) }}" class="id-photo">
                                    </div>
                                    <div class="text-container">
                                        <div>{{ $student->name }}</div>
                                        <div>{{ $student->course->course_title ?? 'N/A' }}</div>
                                    </div>
                                    <div class="id-details">
                                        <p><b>ID:</b> {{ $student->student_id }}</p>
                                        <p><b>Father:</b> {{ $student->father_name ?? 'N/A' }} </p>
                                        <p><b>Admission:</b> {{ $student->doa ?? 'N/A' }}</p>
                                        <p><b>Contact:</b> {{ $student->contact_number ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <a href="{{ route('students.downloadIdCard', $student->student_id) }}" class="btn btn-primary btn-sm mt-3">
                                    <i class="fas fa-download"></i> Download
                                </a>
                                <a href="{{ route('students.viewIdCard', $student->student_id) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="card-footer text-center">
            {{ $students->links() }}
        </div>
    </div>
</div>

<script>
    document.getElementById('searchBox').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let studentItems = document.querySelectorAll('.student-item');
        
        studentItems.forEach(function (item) {
            let text = item.textContent.toLowerCase();
            item.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>

@endsection

@push('css')
<style>
    @page {
        margin: 0;
    }
    body, html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        height: 100%;
        width: 100%;
        box-sizing: border-box;
    }
    .id-card {
        width: 211.2px;
        height: 336px;
        background: #f5f5f5;
        position: relative;
        border: 1px solid #ddd;
        box-sizing: border-box;
        padding: 10px;
        overflow: hidden;
        text-align: center;
    }
    .id-bg {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        object-fit: cover;
        z-index: -1;
    }
    .image {
        position: absolute;
        top: 50px;
        left: 50%;
        transform: translateX(-50%);
    }
    .id-photo {
        width: 60px;
        height: 70px;
        border-radius: 50%;
        border: 2px solid white;
    }
    .text-container {
        position: absolute;
        top: 120px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        color: black;
        font-weight: bold;
        font-size: 12px;
    }
    .id-details {
        position: absolute;
        top: 180px;
        left: 30px;
        font-size: 10px;
        color: black;
        text-align: left;
    }
</style>
@endpush
