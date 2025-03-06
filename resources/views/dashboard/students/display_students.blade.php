@extends('dashboard.layout.adminlte')
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
                
                    <th>Student ID</th>
                    <th>Name</th>
                    <th class="d-none d-md-table-cell">Father's Name</th>
                    <th class="d-none d-md-table-cell">Date of Admission</th>
                    <th>Course</th>
                    <th class="d-none d-md-table-cell">Batch</th>
                    <th>Photo</th>
                    <th>Course status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
    <tr>
        <td>
            <input type="checkbox" name="student_ids[]" value="{{ $student->student_id }}" class="student-checkbox">
        </td>
      
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
    <select name="course_status" class="form-control form-control-sm course-status" data-student-id="{{ $student->student_id }}">
        <option value="ongoing" {{ $student->course_status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
        <option value="completed" {{ $student->course_status === 'completed' ? 'selected' : '' }}>Completed</option>
        <option value="dropped" {{ $student->course_status === 'dropped' ? 'selected' : '' }}>Dropped</option>
    </select>
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
   
</div>

</div>

</div>
@endsection

@push('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

    <script>
        function toggleSelectAll() {
            const masterCheckbox = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.student-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = masterCheckbox.checked);
        }

        let checkedRows = {};
        let table;

        $(document).ready(function() {
            table = $('#studentTable').DataTable({
                "order": [[1, "desc"]],
                "pageLength": 30,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "columnDefs": [
                    { "orderable": false, "targets": [0, 9] }
                ]
            });

            $('#selectAll').on('click', function() {
                $('.student-checkbox').prop('checked', this.checked).trigger('change');
            });

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

            $(document).on('click', '.delete-student', function() {
                let studentId = $(this).data('student-id');
                if (confirm("Are you sure you want to delete this student?")) {
                    $.ajax({
                        url: '{{ route('students.destroy') }}',
                        type: "DELETE",
                        data: { _token: "{{ csrf_token() }}", id: studentId },
                        success: function(response) {
                            alert(response.message);
                            location.reload();
                        },
                        error: function (xhr) {
                            alert('Error: ' + xhr.responseJSON.message);
                        }
                    });
                }
            });

            $(document).on('change', '.student-status', function() {
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
                    success: function(response) {
                        alert('Status updated successfully');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            });

            $('#bulkActionApply').on('click', function() {
                const selectedIds = [];
                $('.student-checkbox:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length === 0) {
                    alert('No students selected');
                    return;
                }

                const action = $('#bulkActionDropdown').val();

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
                            success: function(response) {
                                alert('Selected students deleted successfully');
                                location.reload();
                            },
                            error: function(xhr) {
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
                            success: function(response) {
                                alert('Status updated successfully for selected students');
                                location.reload();
                            },
                            error: function(xhr) {
                                alert('Error: ' + xhr.responseJSON.message);
                            }
                        });
                    }
                }
            });

            $("#searchBox").on("keyup", function() {
                let query = $(this).val();
                $.ajax({
                    url: "{{ route('students.search') }}",
                    method: "GET",
                    data: { query: query },
                    success: function(data) {
                        $("tbody").html(data);
                    }
                });
            });
        });






        
    
        $('.course-status').change(function() {
            var studentId = $(this).data('student-id');
            var courseStatus = $(this).val();

            $.ajax({
                url: "{{ route('students.update_course_status') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    student_id: studentId,
                    course_status: courseStatus
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr) {
                    alert('Error updating course status');
                }
            });
        });
    




    </script>
@endpush