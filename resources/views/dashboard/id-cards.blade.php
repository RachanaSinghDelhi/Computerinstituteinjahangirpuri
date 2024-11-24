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
<!-- Display ID Card Template with student details -->
<!-- Display ID Card Template with student details -->
<div class="id-card-container" style="position: relative; width: 300px; height: 450px;">
    <!-- ID Card Background Template -->
    <img src="{{ asset('assets/images/id_card.jpg') }}" alt="ID Card Template" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;">
    
    <!-- Overlay Student's Photo -->
    @if($student->photo)
        <div style="position: absolute; top: 55px; left: 50%; transform: translateX(-50%);">
            <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" width="90" height="90" class="img-thumbnail rounded-circle">
        </div>
    @endif
    
    <!-- Overlay Student's Name (Less Bold) -->
    <div style="position: absolute; top: 170px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: normal; color: white; text-align: center; white-space: nowrap;">
        <b>{{ $student->name }}</b>
    </div>
    
    <!-- Overlay Student's Course Name (Subheading) -->
    <div style="position: absolute; top: 190px; left: 50%; transform: translateX(-50%); font-size: 14px; color: white; text-align: center; white-space: nowrap;">
        {{ $student->course->course_title ?? 'N/A' }}
    </div>

    <!-- Overlay Student's ID (Left-aligned with left margin and bold) -->
    <div style="position: absolute; top: 230px; left: 50px; font-size: 14px; color: black; font-weight: bold; padding-top: 10px;">
        ID: {{ $student->student_id }}
    </div>
    
    <!-- Overlay Father's Name (Left-aligned with left margin and bold) -->
    <div style="position: absolute; top: 260px; left: 50px; font-size: 14px; color: black; font-weight: bold; padding-top: 10px;">
        Father: {{ $student->father_name ?? 'N/A' }}
    </div>
    
    <!-- Overlay Date of Admission (Left-aligned with left margin and bold) -->
    <div style="position: absolute; top: 290px; left: 50px; font-size: 14px; color: black; font-weight: bold; padding-top: 10px;">
        Dt. Admission: {{ $student->doa ?? 'N/A' }}
    </div>
    
    <!-- Overlay Contact Number (Left-aligned with left margin and bold) -->
    <div style="position: absolute; top: 320px; left: 50px; font-size: 14px; color: black; font-weight: bold; padding-top: 10px;">
        Contact: {{ $student->contact_number ?? 'N/A' }}
    </div>
</div>



                        <!-- Download Button -->
                        <a href="{{ route('students.downloadIdCard', $student->id) }}" class="btn btn-primary btn-sm">Download ID Card</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
