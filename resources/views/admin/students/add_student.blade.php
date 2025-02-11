@extends('admin.app')
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
    <div>
        <a href="{{ route('admin.students.index') }}">
            <button class="btn btn-sm btn-success">Student List</button>
        </a>
    </div>
    <!-- Student Form -->
    <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data" id="studentForm">
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
            <input type="hidden" id="cropped-photo" name="cropped_photo">
            <div class="mt-2">
                <img id="imagePreview" src="" style="display: none; width: 100%; max-height: 300px; object-fit: cover; border: 1px solid #ddd; padding: 5px;">
            </div>
      
        </div>

        <div class="row mb-3">
            <div class="mt-3">
                <label for="rotationSlider" class="form-label">Rotate Image</label>
                <input type="range" id="rotationSlider" class="form-range" min="-180" max="180" step="1" value="0">
                <span id="rotationValue">0°</span>
            </div>
        </div>

               <!-- Canvas to store cropped image -->
        <canvas id="canvas" style="display: none;"></canvas>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const image = document.getElementById('imagePreview');
    const input = document.getElementById('photo');
    const rotationSlider = document.getElementById('rotationSlider');
    const rotationValue = document.getElementById('rotationValue');
    const croppedPhotoField = document.getElementById('cropped-photo');
    let cropper;

    // Image input change event to initialize cropping
    input.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (event) => {
            image.src = event.target.result;
            image.style.display = 'block';

            if (cropper) cropper.destroy();

            cropper = new Cropper(image, {
              
                viewMode: 2,
                autoCropArea: 1
            });
        };
        reader.readAsDataURL(file);
    });

    // Image rotation slider
    rotationSlider.addEventListener('input', function () {
        if (cropper) {
            const rotateValue = parseInt(this.value);
            cropper.rotateTo(rotateValue);
            rotationValue.textContent = `${rotateValue}°`;
        }
    });

    // Crop the image and set base64 to hidden input before form submit
    function getCroppedImageData() {
        if (cropper) {
            const canvasData = cropper.getCroppedCanvas();
            const croppedDataUrl = canvasData.toDataURL(); // base64 encoded image
            croppedPhotoField.value = croppedDataUrl;  // Set the cropped image in the hidden field
        }
    }

    // Handle the form submission
    document.getElementById('studentForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent form from submitting immediately
        getCroppedImageData(); // Ensure the cropped image data is saved in the hidden input
        this.submit(); // Now submit the form after setting the cropped image data
    });
});

</script>
@endpush