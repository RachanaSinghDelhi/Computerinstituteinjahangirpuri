@extends('dashboard.app')
@section('title', 'Add Students')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Add New Student</h2>

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

    <!-- Student Form -->
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" value="{{ old('student_id') }}">
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="father_name" class="form-label">Father's Name</label>
                <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}">
            </div>
            <div class="col-md-6">
                <label for="doa" class="form-label">Date of Admission</label>
                <input type="date" class="form-control" id="doa" name="doa" value="{{ old('doa') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="course" class="form-label">Course</label>
                <select class="form-select" id="course" name="course">
    <option selected disabled>Select Course</option>
    @foreach($courses as $course)
        <option value="{{ $course->id }}" {{ old('course') == $course->id ? 'selected' : '' }}>{{ $course->course_title }}</option>
    @endforeach
</select>
            </div>
            <div class="col-md-6">
            <div class="mb-3">
        <label for="batch" class="form-label">Batch</label>
        <select class="form-select" id="batch" name="batch">
            <option selected disabled>Select Batch</option>
            @php
                $start = strtotime('08:00 AM');
                $end = strtotime('09:00 PM');
                while ($start < $end) {
                    $slot = date('h:i A', $start) . ' - ' . date('h:i A', strtotime('+1 hour', $start));
                    echo "<option value=\"$slot\">$slot</option>";
                    $start = strtotime('+1 hour', $start);
                }
            @endphp
        </select>
    </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="photo" class="form-label">Photo (optional)</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
