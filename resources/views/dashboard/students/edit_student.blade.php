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
    <div>
        <a href="{{ route('students.index') }}">
            <button class="btn btn-sm btn-success">Students List</button>
        </a>
    </div>

    <!-- Form for editing a student -->
    <form action="{{ route('students.update', $student->student_id) }}" method="POST" enctype="multipart/form-data">
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
            <!-- Photo Upload -->
            <div class="col-md-12 mb-3">
                <label for="photo" class="form-label">Photo</label>
                <div class="mb-2">
                    @if($student->photo)
                        <img src="{{ asset('storage/students/' . $student->photo) }}" id="current-photo" alt="Student Photo" width="100">
                    @endif
                </div>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">

                <!-- Image Crop Modal -->
                <div id="crop-modal" class="modal fade" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cropModalLabel">Crop Photo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">
                                    <img id="image-to-crop" src="" alt="Image to Crop">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="rotate-left">Rotate Left</button>
                                <button type="button" class="btn btn-primary" id="rotate-right">Rotate Right</button>
                                <button type="button" class="btn btn-success" id="crop-image">Crop & Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hidden Input for Cropped Image -->
                <input type="hidden" id="cropped-photo" name="cropped_photo">
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
@push('scripts')
<!-- Cropper.js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const photoInput = document.getElementById('photo');
        const cropModal = new bootstrap.Modal(document.getElementById('crop-modal'));
        const imageToCrop = document.getElementById('image-to-crop');
        const croppedPhotoInput = document.getElementById('cropped-photo');
        let cropper;

        photoInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    imageToCrop.src = event.target.result;
                    cropModal.show();

                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(imageToCrop, {
                        aspectRatio: 1,
                        viewMode: 2,
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('rotate-left').addEventListener('click', function () {
            cropper.rotate(-45);
        });

        document.getElementById('rotate-right').addEventListener('click', function () {
            cropper.rotate(45);
        });

        document.getElementById('crop-image').addEventListener('click', function () {
            const canvas = cropper.getCroppedCanvas();
            croppedPhotoInput.value = canvas.toDataURL('image/jpeg');
            cropModal.hide();
        });
    });
</script>
@endpush


