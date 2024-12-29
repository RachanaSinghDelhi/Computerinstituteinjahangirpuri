@extends('dashboard.app')
@section('title', 'Edit Student')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Student</h2>


<!-- Success and Error Messages -->
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- Form for editing a student -->
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Student ID (Read-Only) -->
            <div class="col-md-6 mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $student->student_id }}" readonly>
            </div>

            <!-- Name -->
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Father's Name -->
            <div class="col-md-6 mb-3">
                <label for="father_name" class="form-label">Father's Name</label>
                <input type="text" class="form-control" id="father_name" name="father_name" value="{{ $student->father_name }}" required>
            </div>

            <!-- Date of Admission -->
            <div class="col-md-6 mb-3">
                <label for="doa" class="form-label">Date of Admission</label>
                <input type="date" class="form-control" id="doa" name="doa" value="{{ $student->doa }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Course -->
            <div class="col-md-6 mb-3">
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
            <div class="col-md-6 mb-3">
                <label for="batch" class="form-label">Batch</label>
                <select class="form-select" id="batch" name="batch" required>
                    <option disabled>Select Batch</option>
                    @php
                        $start = strtotime('08:00 AM');
                        $end = strtotime('08:00 PM');
                        while ($start < $end) {
                            $slot = date('h:i A', $start) . ' - ' . date('h:i A', strtotime('+1 hour', $start));
                    @endphp
                            <option value="{{ $slot }}" {{ old('batch', $student->batch) == $slot ? 'selected' : '' }}>
                                {{ $slot }}
                            </option>
                    @php
                            $start = strtotime('+1 hour', $start);
                        }
                    @endphp
                </select>
            </div>
        </div>
         
    

        <div class="row">
            <!-- Contact Number -->
            <div class="col-md-6 mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $student->contact_number }}" required>
            </div>

            <!-- Photo -->
            <div class="col-md-12 mb-3">
                <label for="photo" class="form-label">Photo</label>
                @if($student->photo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" width="100">
                    </div>
                @endif
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
        </div>
            <!-- Photo -->
          
     

        <!-- Submit Button -->
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update Student</button>
            </div>
        </div>
    </form>
</div>
@endsection
