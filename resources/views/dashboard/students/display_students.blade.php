@extends('dashboard.app')
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

    <!-- Table and Search Section -->
    <div class="row mt-4">
        <div class="col-12 col-md-4">
            <!-- Bulk Action Section -->
            <div class="mb-3 d-flex align-items-center">
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
        </div>

        <div class="col-12 col-md-4">
            <!-- Search Box -->
            <div class="mb-3">
                <input type="text" id="searchBox" class="form-control" placeholder="Search by Student ID or Name">
            </div>
        </div>

      <!--  <div class="col-12 col-md-4">
            <div class="mb-3">
                <button type="button" class="btn btn-info btn-sm" id="exportExcel">Export to Excel</button>
                <button type="button" class="btn btn-warning btn-sm" id="exportSQL">Export to SQL</button>
            </div>
        </div>-->
    </div>

    <!-- Add New Student Button -->
    <div class="row">
    <div class="col">
        <a href="{{ route('students.index') }}">
            <button class="btn btn-sm btn-success">Student List</button>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('fees.index') }}">
            <button class="btn btn-sm btn-primary">Fees List</button>
        </a>
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
                @include('dashboard.students.student_search', ['students' => $students]) <!-- Include search results -->
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $students->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection

@push('scripts')
<!-- Custom JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<script>
    function toggleSelectAll() {
        const masterCheckbox = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.student-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = masterCheckbox.checked);
    }

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

        // Bulk action: Update status or delete selected students
        $('#bulkActionApply').on('click', function () {
            const selectedIds = [];
            $('.student-checkbox:checked').each(function () {
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
     
    $('#searchBox').on('keyup', function () {
        let query = $(this).val().toLowerCase().trim(); // Convert input to lowercase and trim spaces
        $('#studentTable tbody tr').each(function () {
            let studentID = $(this).find('td:nth-child(3)').text().trim(); // Student ID column
            let name = $(this).find('td:nth-child(4)').text().toLowerCase().trim(); // Name column

            // Convert studentID to a number only if the query is numeric
            let isMatch = name.includes(query) || (isNaN(query) ? false : studentID.includes(query));

            $(this).toggle(isMatch); // Show/hide rows based on match
        });
    });


    });
</script>
@endpush