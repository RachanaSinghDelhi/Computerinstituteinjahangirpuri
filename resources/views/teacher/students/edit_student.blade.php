@extends('teacher.layout.adminlte')
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

    <div>
        <a href="{{ route('teacher.students.index') }}">
            <button class="btn btn-sm btn-success">Students List</button>
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Post List</h3>
        </div>

        
        <div class="card-body">
    <!-- Form for editing a student -->
    <form action="{{ route('teacher.students.update', $student->student_id) }}" method="POST" enctype="multipart/form-data">
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
                <select class="form-control" id="batch" name="batch" required>
                    <option disabled>Select Batch</option>
                    @php
                        $start = strtotime('08:00 AM');
                        $end = strtotime('08:00 PM');
                        while ($start < $end) {
                            $slot = date('h A', $start); // Changed to display only the start time
                    @endphp
                            <option value="{{ $slot }}" {{ old('batch', $student->batch) == $slot ? 'selected' : '' }}>{{ $slot }}</option>
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
            <!-- Photo Upload -->
            <div class="col-md-12 mb-3">
                <label for="photo" class="form-label">Photo</label>
                <div class="mb-2">
                    @if($student->photo)
                        <img src="{{ asset('storage/students/' . $student->photo) }}" id="current-photo" alt="Student Photo" width="100">
                    @endif
                </div>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                <button type="button" class="btn btn-info" id="rotate-left">Rotate left</button>
                <button type="button" class="btn btn-info" id="rotate-right">Rotate Right</button>
                <!-- Image Cropper Area -->
                <div class="img-container mt-3">
                    <img id="image-to-crop" src="" alt="Image to Crop" style="max-width: 300px; height:300px; display: none;">
                </div>

                <div class="mt-3">
                    <button type="button" class="btn btn-primary" id="crop-image">Crop Image</button>
                  
                    <button type="button" class="btn btn-secondary" id="reset-image">Reset</button>
                </div>

                <!-- Hidden Input for Cropped Image -->
                <input type="hidden" id="cropped-photo" name="cropped_photo">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update Student</button>
            </div>
        </div>
    </form>
</div>
                    </div>
                    </div>
@endsection

@push('js')
<!-- Cropper.js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const photoInput = document.getElementById('photo');
    const imageToCrop = document.getElementById('image-to-crop');
    const croppedPhotoInput = document.getElementById('cropped-photo');
    let cropper;

    photoInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                imageToCrop.src = event.target.result;
                imageToCrop.style.display = 'block';

                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(imageToCrop, {
                   
                    viewMode: 2,
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // Rotate Left (Counterclockwise)
    document.getElementById('rotate-left').addEventListener('click', function () {
        if (cropper) {
            cropper.rotate(-5); // Rotate 90 degrees counterclockwise
        }
    });

    // Rotate Right (Clockwise)
    document.getElementById('rotate-right').addEventListener('click', function () {
        if (cropper) {
            cropper.rotate(5); // Rotate 90 degrees clockwise
        }
    });

    document.getElementById('crop-image').addEventListener('click', function () {
        const canvas = cropper.getCroppedCanvas();
        croppedPhotoInput.value = canvas.toDataURL('image/jpeg');
    });

    document.getElementById('reset-image').addEventListener('click', function () {
        imageToCrop.style.display = 'none';
        croppedPhotoInput.value = '';
    });
});

</script>
@endpush
