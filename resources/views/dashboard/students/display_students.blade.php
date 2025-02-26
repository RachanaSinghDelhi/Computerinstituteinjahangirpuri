@extends('adminlte::page')
@section('title', 'Students List')
@section('content')
<div class="container container-fluid mt-4">
    <h2 class="mb-4">Student List</h2>

    <!-- Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Import Students via Excel -->
    <h2>Import Students via Excel</h2>
    <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Upload Excel File</label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Import</button>
    </form>
<br>
<!-- Table, Search, and Buttons in One Row -->
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Student List</h3>
        </div>

        
        <div class="card-body">
            
<div class="row mt-4 align-items-center">
    <div class="col-auto">
        <!-- Bulk Action Section -->
        <input type="checkbox" id="selectAll" onclick="toggleSelectAll()" class="me-2">
        <label for="selectAll" class="me-3">Select All</label>
        <select id="bulkActionDropdown" class="form-select form-select-sm me-2" style="width: 150px;">
            <option value="">Choose Action</option>
            <option value="Active">Set as Active</option>
            <option value="Inactive">Set as Inactive</option>
            <option value="Completed">Set as Completed</option>
            <option value="Left">Set as Left</option>
            <option value="Delete">Delete Selected</option>
        </select>
        <button type="button" class="btn btn-primary btn-sm" id="bulkActionApply">Apply</button>
    </div>

    <div class="col-auto">
        <!-- Search Box -->
        <input type="text" id="searchBox" class="form-control" placeholder="Search by Student ID or Name">
    </div>

    <div class="col-auto">
        <!-- Add Student Button -->
        <a href="{{ route('students.create') }}" class="btn btn-sm btn-success">Add Student</a>
    </div>

    <div class="col-auto">
        <!-- Fees List Button -->
        <a href="{{ route('fees.index') }}" class="btn btn-sm btn-primary">Fees List</a>
    </div>
</div>


    <!-- Responsive Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="studentTable">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th class="d-none d-md-table-cell">Father's Name</th>
                    <th class="d-none d-md-table-cell">Date of Admission</th>
                    <th>Course</th>
                    <th class="d-none d-md-table-cell">Batch</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
    <tr>
        <td>
            <input type="checkbox" name="student_ids[]" value="{{ $student->student_id }}" class="student-checkbox">
        </td>
        <td>{{ $student->id }}</td>
        <td>{{ $student->student_id }}</td>
        <td>{{ $student->name }}</td>
        <td class="d-none d-md-table-cell">{{ $student->father_name }}</td>
        <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($student->doa)->format('d-m-Y') }}</td>
        <td>{{ $student->course->course_title ?? 'N/A' }}</td>
        <td class="d-none d-md-table-cell">{{ $student->batch }}</td>
        <td>
            @if($student->photo)
                <img src="{{ asset('storage/students/' . $student->photo) }}" alt="Student Photo" width="50">
            @else
                No Photo
            @endif
        </td>
        <td>
            <select name="status" class="form-control form-control-sm student-status" data-student-id="{{ $student->student_id }}">
                <option value="Active" {{ strtoupper(trim($student->status)) === 'ACTIVE' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ strtoupper(trim($student->status)) === 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
                <option value="Left" {{ strtoupper(trim($student->status)) === 'LEFT' ? 'selected' : '' }}>Left</option>
                <option value="Completed" {{ strtoupper(trim($student->status)) === 'COMPLETED' ? 'selected' : '' }}>Completed</option>
            </select>
            <a href="{{ route('students.edit', $student->student_id) }}" class="btn btn-primary btn-sm">Edit</a>
            <button type="button" class="btn btn-danger btn-sm delete-student" data-student-id="{{ $student->student_id }}">Delete</button>
        </td>
    </tr>
@endforeach
            </tbody>
        
        </table>
    </div>
    <div class="card-footer clearfix">
    <!--<ul class="pagination pagination-sm m-0 float-right">
   
    {{ $students->links('pagination::bootstrap-4') }}

    </ul>-->
</div>
</div>

</div>

</div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<script>
    function toggleSelectAll() {
        const masterCheckbox = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.student-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = masterCheckbox.checked);
    }



    $(document).ready(function() {
    let checkedRows = {}; // Store checkbox states

    let table = $('#studentTable').DataTable({
        "order": [[1, "desc"]], // Default sorting by ID column
        "pageLength": 30, // Show 30 rows per page
        "columnDefs": [
            { "orderable": false, "targets": [0, 6, 7] } // Disable sorting for checkboxes, dropdowns, and actions
        ]
    });

    // ✅ Select All Checkbox Functionality
    $('#select_all').on('click', function() {
        $('.student-checkbox').prop('checked', this.checked).trigger('change');
    });

    // ✅ Preserve Checkboxes After Sorting & Pagination
    $('#studentTable tbody').on('change', '.student-checkbox', function() {
        let rowId = $(this).val();
        checkedRows[rowId] = $(this).prop('checked');
    });

    table.on('draw', function() {
        $('.student-checkbox').each(function() {
            let rowId = $(this).val();
            $(this).prop('checked', checkedRows[rowId] || false);
        });
    });

    // ✅ Initialize Multi-Select
    $('.select-options').select2({
        placeholder: "Select options",
        allowClear: true
    });

    // ✅ Handle Delete Button
    $(document).on('click', '.delete-student', function() {
        let studentId = $(this).data('id');
        if (confirm("Are you sure you want to delete this student?")) {
            // Perform AJAX delete request
            $.ajax({
                url: `/students/${studentId}`,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function(response) {
                    alert(response.message);
                    table.ajax.reload();
                }
            });
        }
    });
});

    $(document).ready(function () {
        // Update status for a single student
        $(document).on('change', '.student-status', function () {
            const studentId = $(this).data('student-id');
            const status = $(this).val();
            $.ajax({
                url: '{{ route('students.update-status') }}',
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: studentId,
                    status: status
                },
                success: function (response) {
                    alert('Status updated successfully');
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        });

        // Delete a single student
        $(document).on('click', '.delete-student', function () {
            const studentId = $(this).data('student-id');
            if (confirm('Are you sure you want to delete this student?')) {
                $.ajax({
                    url: '{{ route('students.destroy') }}',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: studentId
                    },
                    success: function (response) {
                        alert('Student deleted successfully');
                        location.reload();
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            }
        });

        $('#bulkActionApply').on('click', function () {
    const selectedIds = [];
    $('.student-checkbox:checked').each(function () {
        selectedIds.push($(this).val());
    });

    console.log('Selected IDs:', selectedIds); // Debugging

    if (selectedIds.length === 0) {
        alert('No students selected');
        return;
    }

    const action = $('#bulkActionDropdown').val();
    console.log('Selected Action:', action); // Debugging

    if (!action) {
        alert('Please select an action');
        return;
    }

    if (action === 'Delete') {
        if (confirm('Are you sure you want to delete selected students?')) {
            $.ajax({
                url: '{{ route('students.deleteMultiple') }}',
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: selectedIds
                },
                success: function (response) {
                    alert('Selected students deleted successfully');
                    location.reload();
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        }
    } else {
        if (confirm(`Are you sure you want to set status to "${action}" for selected students?`)) {
            $.ajax({
                url: '{{ route('students.bulkUpdateStatus') }}',
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: selectedIds,
                    status: action
                },
                success: function (response) {
                    alert('Status updated successfully for selected students');
                    location.reload();
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        }
    }
});

        // Handle search input
        $("#searchBox").on("keyup", function () {
        let query = $(this).val();
        $.ajax({
            url: "{{ route('students.search') }}", // Ensure this route exists in your web.php
            method: "GET",
            data: { query: query },
            success: function (data) {
                $("tbody").html(data); // Replace table body with filtered results
            }
        });
    });

    });
</script>
@endpush