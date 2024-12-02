@extends('dashboard.app')
@section('title', 'Students List')
@section('content')

    <table id="studentTable" class="table table-bordered">
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
    <input type="file" name="image" class="image" data-student-id="" />
</td>
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
                    <input type="file" name="photo" class="photo-upload" data-student-id="{{ $student->id }}" />
                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Photo" class="img-thumbnail" style="width: 50px;" data-student-id="{{ $student->id }}" />

                </td>
                <td>
    <button class="btn btn-danger btn-sm remove-row" data-student-id="{{ $student->id }}">Remove</button>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination-container">
        {{ $students->links() }}
    </div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        
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
        // Photo upload handling
$('input[type="file"].photo-upload').on('change', function() {
    var formData = new FormData();
    var student_id = $(this).data('student-id'); // Get the student ID
    var photo = $(this)[0].files[0]; // Get the file

    formData.append('photo', photo); // Append the file to formData
    formData.append('student_id', student_id); // Append student_id
    formData.append('_token', '{{ csrf_token() }}'); // CSRF Token

    $.ajax({
        url: '{{ route("update.student.photo") }}', // Make the AJAX request to update the photo
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.success) {
                // Only update the photo for the specific student row that was updated
                $('tr').find('.img-thumbnail[data-student-id="' + student_id + '"]').attr('src', response.photoUrl);
                alert(response.message); // Show success message
            }
        },
        error: function(error) {
            console.log(error);
            alert('An error occurred while uploading the photo.');
        }
    });
});


        // Remove row on click
        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });

    });




    $('.add-row').click(function () {
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

    var image = row.find('input[name="image"]')[0].files[0];
    if (image) {
        formData.append('photo', image);
    }

    $.ajax({
        url: '{{ route("students.store") }}',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success) {
                alert(response.message); // Show success message
                location.reload();
            } else {
                alert('Error: ' + response.message); // Show error message from server
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                var errorMessages = '';
                for (var key in errors) {
                    errorMessages += errors[key] + '\n'; // Aggregate error messages
                }
                alert('Validation Errors:\n' + errorMessages);
            } else {
                alert('An unexpected error occurred. Please try again later.');
            }
        }
    });
});




   
</script>
@endpush
