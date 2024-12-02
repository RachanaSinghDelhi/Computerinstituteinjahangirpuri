@extends('dashboard.app')
@section('title', 'Student ID Cards')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Student ID Cards</h2>

    <form action="{{ route('students.downloadSelectedIdCards') }}" method="POST">
    @csrf
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td><input type="checkbox" name="selected_ids[]" value="{{ $student->student_id }}"></td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->course->course_title ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Display error message if no IDs are selected -->
    @if($errors->has('selected_ids'))
        <div style="color: red; font-weight: bold;">
            {{ $errors->first('selected_ids') }}
        </div>
    @endif

    <button type="submit">Download Selected ID Cards</button>
</form>





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
                        <div class="id-card-container" style="position: relative; width: 300px; height: 450px; border: 1px solid #ddd;">
                            <!-- ID Card Background Template -->
                            <img src="{{ asset('assets/images/id_card.jpg') }}" alt="ID Card Template" 
                                 style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; object-fit: cover;">
                            
                            <!-- Overlay Student's Photo -->
                            @if($student->photo)
                                <div style="position: absolute; top: 55px; left: 50%; transform: translateX(-50%);">
                                    <img src="{{ asset('storage/' . $student->photo) }}" 
                                         alt="Student Photo" width="90" height="90" 
                                         class="img-thumbnail rounded-circle">
                                </div>
                            @endif

                            <!-- Overlay Student Details -->
                            <div style="position: absolute; top: 170px; left: 50%; transform: translateX(-50%); text-align: center; color: white;">
                                <div style="font-size: 16px; font-weight: bold;">{{ $student->name }}</div>
                                <div style="font-size: 14px;">{{ $student->course->course_title ?? 'N/A' }}</div>
                            </div>

                            <!-- Additional Info -->
                            <div style="position: absolute; top: 230px; left: 50px; font-size: 14px; color: black;">
                                <div><b>ID:</b> {{ $student->student_id }}</div>
                                <div><b>Father:</b> {{ $student->father_name ?? 'N/A' }}</div>
                                <div><b>Dt. Admission:</b> {{ $student->doa ?? 'N/A' }}</div>
                                <div><b>Contact:</b> {{ $student->contact_number ?? 'N/A' }}</div>
                            </div>
                        </div>

                        <!-- Download Button -->
                        <a href="{{ route('students.downloadIdCard', $student->student_id) }}" 
                           class="btn btn-primary btn-sm mt-3">Download ID Card</a>

                           <a href="{{ route('students.viewIdCard', $student->student_id) }}" class="btn btn-secondary btn-sm">View ID Card</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="container">
{{ $students->links() }}
</div>
@endsection
