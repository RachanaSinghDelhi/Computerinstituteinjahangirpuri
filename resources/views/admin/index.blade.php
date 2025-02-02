@extends('admin.app')
@section('title', 'Students List')
@section('content')
<div class="container container-fluid mt-4">
    <h2 class="mb-4">Student List</h2>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row mt-4">
    <!-- Bulk Action Section -->
    <div class="col-md-8">
        <div class="d-flex align-items-center flex-wrap">
            <input type="checkbox" id="selectAll" onclick="toggleSelectAll()" class="me-2">
            <label for="selectAll" class="me-3">Select All</label>
            <select id="bulkActionDropdown" class="form-select form-select-sm me-2" style="width: 150px;">
                <option value="">Choose Action</option>
                <option value="Active">Set as Active</option>
                <option value="Inactive">Set as Inactive</option>
                <option value="Completed">Set as Completed</option>
                <option value="Left">Set as Left</option>
            </select>
            <button type="button" class="btn btn-primary btn-sm" id="bulkActionApply">Apply</button>
        </div>
    </div>
    
    <!-- Add New Student Button -->
    <div class="col-md-4 text-md-end mt-2 mt-md-0">
        <a href="{{ route('admin.students.add') }}" class="btn btn-primary">Add New Student</a>
    </div>
</div>

    <!-- DataTable -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="studentTable" style="width:100%">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Admission Date</th>
                    <th>Course</th>
                    <th>Batch</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td><input type="checkbox" class="student-checkbox" value="{{ $student->student_id }}"></td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->doa)->format('d-m-Y') }}</td>
                    <td>{{ $student->course->course_title ?? 'N/A' }}</td>
                    <td>{{ $student->batch }}</td>
                    <td>
                        @if($student->photo)
                        <img src="{{ asset('storage/students/' . $student->photo) }}" width="50" alt="Student Photo">
                        @else
                        No Photo
                        @endif
                    </td>
                    <td>
                        <select class="form-control status-select" data-id="{{ $student->student_id }}" >
                        <option value="Active" {{ strtoupper(trim($student->status)) === 'ACTIVE' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ strtoupper(trim($student->status)) === 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
                <option value="Left" {{ strtoupper(trim($student->status)) === 'LEFT' ? 'selected' : '' }}>Left</option>
                <option value="Completed" {{ strtoupper(trim($student->status)) === 'COMPLETED' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </td>
                    <td>
                        <a href="{{ route('admin.students.edit', $student->student_id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables Dependencies -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#studentTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Export Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: [1,2,3,4,5,6,8] // Export all columns except checkbox and actions
                }
            },
            {
                extend: 'csvHtml5',
                text: 'Export SQL',
                className: 'btn btn-info',
                filename: 'students_sql_export',
                exportOptions: {
                    columns: [1,2,3,4,5,6,8],
                    format: {
                        body: function(data, row, column, node) {
                            // Format data for SQL import
                            return "'" + data.replace(/'/g, "''") + "'";
                        }
                    }
                }
            }
        ],
        columnDefs: [{
            orderable: false,
            targets: [0, 7, 9] // Make checkbox, photo, and actions columns non-orderable
        }],
        order: [[1, 'asc']] // Default sorting by Student ID
    });

    // Select/Deselect All
    $('#selectAll').on('click', function() {
        $('.student-checkbox').prop('checked', this.checked);
    });

    // Bulk Status Update
    $('#bulkActionApply').on('click', function() {
        const selectedIds = [];
        $('.student-checkbox:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            alert('Please select at least one student');
            return;
        }

        const action = $('#bulkActionDropdown').val();
        if (!action) {
            alert('Please select an action');
            return;
        }

        if (confirm(`Are you sure you want to set the status to "${action}" for the selected students?`)) {
            $.ajax({
                url: '{{ route("admin.students.bulkUpdateStatus") }}',
                method: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: selectedIds,
                    status: action
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        }
    });

    // Individual Delete
    $(document).on('click', '.delete-btn', function() {
        var studentId = $(this).data('id');
        if(confirm('Are you sure you want to delete this student?')) {
            $.ajax({
                url: '/students/' + studentId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    });

    // Individual Status Update
    $(document).on('change', '.status-select', function() {
        var studentId = $(this).data('id');
        var newStatus = $(this).val();
        
        $.ajax({
            url: '/students/update-status/' + studentId,
            type: 'PATCH',
            data: {
                _token: '{{ csrf_token() }}',
                status: newStatus
            },
            success: function(response) {
                alert('Status updated successfully');
            }
        });
    });
});
</script>
@endpush