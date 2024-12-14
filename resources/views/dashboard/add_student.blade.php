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
                <select class="form-select" id="course" name="course_id">
                    <option selected disabled>Select Course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->course_title }}</option>
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
                            $end = strtotime('08:00 PM');
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

        <!-- Add Contact Number Field -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number">
            </div>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            <div>
                <img id="imagePreview" src="" style="display:none; width: 100%; max-height: 300px; object-fit: cover;" />
            </div>
        </div>
        <div class="row mb-3">
        <div class="mt-3">
        <label for="rotationSlider" class="form-label">Rotate Image</label>
        <input type="range" id="rotationSlider" class="form-range" min="0" max="360" step="1" value="0">
        <span id="rotationValue">0°</span>
    </div>
                        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@push('scripts')
<!-- Include the CropperJS CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />

<!-- Include CropperJS JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<script>
   
let image = document.getElementById('imagePreview');
let input = document.getElementById('photo');
let rotationSlider = document.getElementById('rotationSlider');
let rotationValue = document.getElementById('rotationValue');
let cropper;

input.addEventListener('change', function (e) {
    let file = e.target.files[0];
    let reader = new FileReader();

    reader.onload = function (event) {
        image.src = event.target.result;
        image.style.display = 'block';

        // Initialize the cropper
        if (cropper) {
            cropper.destroy();  // Destroy the previous instance before creating a new one
        }

        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 2,
            autoCropArea: 1,
            crop(event) {
                // You can get the cropped image data here
            }
        });

        // Reset rotation slider to 0 when a new image is loaded
        rotationSlider.value = 0;
        rotationValue.innerText = "0°";
    };

    if (file) {
        reader.readAsDataURL(file);
    }
});

// Slider for rotating the image
rotationSlider.addEventListener('input', function () {
    if (cropper) {
        let angle = rotationSlider.value;
        cropper.rotateTo(angle);  // Rotate the image based on slider value
        rotationValue.innerText = `${angle}°`;  // Display the current rotation angle
    }
});
</script>
@endpush

