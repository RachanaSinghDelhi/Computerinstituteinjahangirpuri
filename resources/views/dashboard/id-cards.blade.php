@extends('dashboard.app')
@section('title', 'Student ID Cards')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Student ID Cards</h2>

    <!-- Success/Error Messages -->
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Display all student ID cards -->
    <div class="row">
        @foreach($students as $student)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->name }}</h5>
                        <p class="card-text">Student ID: {{ $student->student_id }}</p>
                        <p class="card-text">Course: {{ $student->course->course_title ?? 'N/A' }}</p>

                        <!-- Display ID Card Template with student details -->
                        <div class="id-card-container" style="position: relative; width: 300px; height: 480px;">
                            <img src="{{ asset('assets/images/id_card.jpg') }}" alt="ID Card Template" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;">
                            
                            <!-- Overlay Student's Photo -->
                            @if($student->photo)
                                <div style="position: absolute; top: 40px; left: 230px;">
                                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" width="60" height="80" class="img-thumbnail">
                                </div>
                            @endif

                            <!-- Overlay Student's Name -->
                            <div style="position: absolute; top: 20px; left: 20px; font-size: 16px; color: white;">
                                {{ $student->name }}
                            </div>

                            <!-- Overlay Student's ID -->
                            <div style="position: absolute; top: 60px; left: 20px; font-size: 14px; color: black;">
                                ID: {{ $student->student_id }}
                            </div>

                            <!-- Overlay Student's Course -->
                            <div style="position: absolute; top: 100px; left: 20px; font-size: 14px; color: black;">
                                Course: {{ $student->course->course_title ?? 'N/A' }}
                            </div>
                        </div>

                        <!-- Download Button -->
                        <a href="" class="btn btn-primary btn-sm">Download ID Card</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
