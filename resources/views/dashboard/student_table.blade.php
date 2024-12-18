@extends('dashboard.app')
@section('title', 'Students List')
@section('content')

    <!-- Search Box -->
    <div class="d-flex justify-content-between mb-3">
        <input type="text" id="searchBox" class="form-control w-50" placeholder="Search students...">
    </div>

    <div class="table-responsive">
        <table id="studentTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>DOA</th>
                    <th>Batch</th>
                    <th>Course</th>
                    <th>Contact Number</th>
                    <th>Photo</th> <!-- Photo Column -->
                    <th>Photo Preview</th> <!-- Photo Column -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               <!-- Blank Row to Add New Student -->
               <tr class="new-row">
                    <td><input type="text" name="student_id" class="editable" data-column="student_id" /></td>
                    <td><input type="text" name="name" class="editable" data-column="name" /></td>
                    <td><input type="text" name="father_name" class="editable" data-column="father_name" /></td>
                    <td><input type="date" name="doa" class="editable" data-column="doa" /></td>
                    <td>
                        <select name="batch" class="editable" data-column="batch">
                            @for($i = 8; $i < 21; $i++) 
                                <option value="{{ $i }}:00">{{ $i }}:00</option>
                            @endfor
                        </select>
                    </td>
                    <td>
                        <select name="course_id" class="editable" data-column="course_id">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="contact_number" class="editable" data-column="contact_number" /></td>
             
                
    <td>
        <input type="file" name="image" class="image" id="imageInput" />
    </td>
    <td>
        <div id="imagePreviewContainer" style="display: none;">
            <img id="imagePreview" src="" style="width: 100%;" />
        </div>
        <button type="button" id="cropButton" class="btn btn-primary" style="display: none;">Crop & Upload</button>
    </td>

    <!-- Other form fields -->


                    <td><button class="btn btn-success btn-sm add-row">Add</button></td>
                </tr>

                <!-- Existing Rows of Students -->
                @foreach($students as $student)
                <tr>
                    <td><input type="text" name="student_id" class="editable" data-column="student_id" value="{{ $student->student_id }}" readonly /></td>
                    <td><input type="text" name="name" class="editable" data-column="name" value="{{ $student->name }}" /></td>
                    <td><input type="text" name="father_name" class="editable" data-column="father_name" value="{{ $student->father_name }}" /></td>
                    <td><input type="date" name="doa" class="editable" data-column="doa" value="{{ $student->doa }}" /></td>
                    <td>
                        <select name="batch" class="editable" data-column="batch">
                            @for($i = 8; $i < 21; $i++)
                                <option value="{{ $i }}:00" {{ $student->batch == "{$i}:00" ? 'selected' : '' }}>{{ $i }}:00</option>
                            @endfor
                        </select>
                    </td>
                    <td>
                        <select name="course_id" class="editable" data-column="course_id">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>{{ $course->course_title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="contact_number" class="editable" data-column="contact_number" value="{{ $student->contact_number }}" /></td>
                    <td>
    <input type="file" class="photo-upload" data-student-id="{{ $student->id }}" />
</td>
<td>
    <img id="image-preview-{{ $student->id }}" class="image-preview" style="display:none; max-width: 100%; height: auto;" />
    <div id="crop-controls-{{ $student->id }}" class="crop-controls" style="display:none; margin-top: 10px;">
        <label for="rotation-angle-{{ $student->id }}">Rotation Angle:</label>
        <input type="number" id="rotation-angle-{{ $student->id }}" class="rotation-angle" placeholder="Enter angle (e.g., 45)" />
        <button type="button" class="rotate-custom" data-student-id="{{ $student->id }}">Rotate</button>
        <button type="button" class="crop-button" data-student-id="{{ $student->id }}">Crop and Upload</button>
    </div>
</td>
                    <td> <img src="{{ asset('storage/students/' . $student->photo) }}" alt="Photo" class="img-thumbnail" style="width: 50px;" data-student-id="{{ $student->id }}" /></td>
                    <td>
                        <button class="btn btn-danger btn-sm remove-row" data-student-id="{{ $student->id }}">Remove</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        {{ $students->links() }}
    </div>

@endsection

@push('scripts')
<!-- Include Cropper.js CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

<!-- Include Cropper.js JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // Implement Search Functionality
        $('#searchBox').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#studentTable tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Edit fields with AJAX on change
        $('.editable').on('change', function() {
            var column = $(this).data('column');
            var value = $(this).val();
            var student_id = $(this).closest('tr').find('input[name="student_id"]').val();

            $.ajax({
                url: '{{ route("update.student") }}',
                method: 'POST',
                data: {
                    student_id: student_id,
                    column: column,
                    value: value,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Photo upload handling
        var originalFilename; // Declare the variable in a broader scope
            let cropper;
// Photo upload handling for individual rows
// Photo upload handling for individual rows
$('input[type="file"].photo-upload').on('change', function () {
    var student_id = $(this).data('student-id'); // Get the student ID specific to the row
    var photo = $(this)[0].files[0]; // Get the selected file
    originalFilename = photo.name; // Store original file name
    var reader = new FileReader();

    reader.onload = function (e) {
        var imagePreview = $('#image-preview-' + student_id); // Use specific preview for the student ID
        imagePreview.attr('src', e.target.result).show();

        var cropperContainer = $('#crop-controls-' + student_id); // Crop controls for specific row
        cropperContainer.show();

        if (cropper) {
            cropper.destroy(); // Destroy previous cropper instance
        }

        cropper = new Cropper(imagePreview[0], {
            aspectRatio: 1,
            viewMode: 1,
            autoCropArea: 0.65,
        });
    };

    reader.readAsDataURL(photo); // Read the image as data URL
});

// Rotate to a custom angle
$(document).on('click', '.rotate-custom', function () {
    var student_id = $(this).data('student-id'); // Get the student ID
    const angle = parseFloat($('#rotation-angle-' + student_id).val()); // Get rotation angle
    if (cropper && !isNaN(angle)) {
        cropper.rotate(angle); // Rotate the image
    } else {
        alert('Please enter a valid rotation angle.');
    }
});

// Crop and upload the image
$(document).on('click', '.crop-button', function () {
    var student_id = $(this).data('student-id'); // Get student ID from the row

    if (!cropper) {
        alert('Please select an image to crop.');
        return;
    }

    var canvas = cropper.getCroppedCanvas();
    canvas.toBlob(function (blob) {
        var formData = new FormData();

        formData.append('photo', blob, originalFilename); // Add cropped image
        formData.append('student_id', student_id); // Add student ID
        formData.append('_token', '{{ csrf_token() }}'); // CSRF Token

        $.ajax({
            url: '{{ route("update.student.photo") }}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    // Update the photo for the specific student
                    $('tr')
                        .find('.img-thumbnail[data-student-id="' + student_id + '"]')
                        .attr('src', response.photoUrl);
                    alert(response.message); // Show success message
                }

                // Cleanup after success
                cropper.destroy();
                cropper = null;
                $('#image-preview-' + student_id).hide();
                $('#crop-controls-' + student_id).hide(); // Hide crop controls after upload
            },
            error: function (error) {
                console.error(error);
                alert('An error occurred while uploading the photo.');
            },
        });
    });
});



        // Remove row on click
        $(document).on('click', '.remove-row', function() {
            var button = $(this); // Reference the button that was clicked
            var student_id = button.data('student-id'); // Get the student ID from the button

            if (confirm("Are you sure you want to delete this student?")) {
                $.ajax({
                    url: 'dashboard/student/' + student_id, // Correct student ID in URL
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF Token
                    },
                    success: function(response) {
                        if (response.success) {
                            button.closest('tr').remove();
                            alert(response.message);
                        } else {
                            alert("Error deleting student.");
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        alert('An error occurred while deleting the student.');
                    }
                });
            }
        });
    });
        // Add row on click
        $(document).ready(function() {
    var cropper; // Store the Cropper instance

    // Handle image selection for cropping
    $('#imageInput').on('change', function(e) {
        var reader = new FileReader();
        reader.onload = function(event) {
            var imagePreview = $('#imagePreview');
            imagePreview.attr('src', event.target.result);

            // Show preview container and crop button
            $('#imagePreviewContainer').show();
            $('#cropButton').show();

            // Initialize or reinitialize Cropper.js
            if (cropper) {
                cropper.destroy(); // Destroy previous instance if exists
            }

            cropper = new Cropper(imagePreview[0], {
                aspectRatio: 1, // Optional: set the aspect ratio for the cropper
                viewMode: 1, // Optional: control the view mode
                autoCropArea: 0.8 // Optional: set the default crop area
            });
        };
        reader.readAsDataURL(e.target.files[0]); // Read the selected image as DataURL
    });

    // Handle the image cropping and form submission
    $('.add-row').click(function() {
        var formData = new FormData();
        var row = $(this).closest('tr');

        formData.append('student_id', row.find('input[name="student_id"]').val());
        formData.append('name', row.find('input[name="name"]').val());
        formData.append('father_name', row.find('input[name="father_name"]').val());
        formData.append('doa', row.find('input[name="doa"]').val());
        formData.append('batch', row.find('select[name="batch"]').val());
        formData.append('course_id', row.find('select[name="course_id"]').val());
        formData.append('contact_number', row.find('input[name="contact_number"]').val());
        formData.append('_token', '{{ csrf_token() }}');

        // Get the cropped image from Cropper.js instance
        if (cropper) {
            var canvas = cropper.getCroppedCanvas();
            canvas.toBlob(function(blob) {
                formData.append('photo', blob); // Append the cropped image to FormData

                // Submit the form data via AJAX
                $.ajax({
                    url: '{{ route("students.store") }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(response.message);
                        // Optionally, refresh the page or update the UI
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                        alert('An error occurred while adding the student.');
                    }
                });
            });
        } else {
            alert('Please select an image to crop.');
        }
    });
});


    
</script>
@endpush
