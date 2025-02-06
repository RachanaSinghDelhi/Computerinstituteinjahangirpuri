@extends('dashboard.app')

@section('content')

<div class="container">
    <h1>Student Fees Status</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Receipts -->
    <div class="container mt-4">
        <h1 class="text-center">Upload Receipts</h1>
        <form action="{{ route('receipts.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input for starting number -->
            <div class="mb-3">
                <label for="starting_number" class="form-label">Starting Number:</label>
                <input type="number" name="starting_number" id="starting_number" class="form-control" required>
            </div>

            <!-- File input -->
            <div class="mb-3">
                <label for="receipts" class="form-label">Select Receipts:</label>
                <input type="file" name="receipts[]" id="receipts" class="form-control" multiple required>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    <div>
        <a href="{{ route('students.create') }}">
            <button class="btn btn-sm btn-success">Add New Student</button>
        </a>
    </div>
    <!-- Fees Table -->
    <div class="mt-4">
        <table id="feesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th  class="d-none d-md-table-cell">Total Fees</th>
                    <th  class="d-none d-md-table-cell">Installments</th>
                    <th  class="d-none d-md-table-cell">Fees Paid</th>
                    <th  class="d-none d-md-table-cell">Fees Due</th>
                    <th class="text-muted">Last Updated</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feesData as $fee)
                    <tr>
                        <td>{{ $fee->student_id }}</td>
                        <td>{{ $fee->student_name }}</td>
                        <td>
                            <form action="{{ route('fees.updateCourse', $fee->student_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="course_id" class="form-control" onchange="this.form.submit()">
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" @if($course->id == $fee->course_id) selected @endif>
                                            {{ $course->course_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td  class="d-none d-md-table-cell">
                        <form action="{{ route('updateTotalFees', $fee->student_id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Use the updated fee value from the session or the current fee value -->
            <input type="number" name="total_fees" value="{{ $fee->student_total_fees }}" class="form-control" required>
            
            <button type="submit" class="btn btn-sm btn-primary mt-2">Update Fees</button>
        </form>
                        </td>
                        <td  class="d-none d-md-table-cell">{{ $fee->installments }}</td>
                        <td  class="d-none d-md-table-cell">{{ $fee->fees_paid }}</td>
                        <td  class="d-none d-md-table-cell">{{ $fee->fees_due }}</td>
                        <td class="text-muted">{{ $fee->last_updated }}</td>
                        <td>
                            <span class="badge 
                                @if($fee->status == 'Paid') 
                                    bg-success 
                                @elseif($fee->status == 'Paid but Pending Next Month') 
                                    bg-warning 
                                @else 
                                    bg-danger 
                                @endif
                            ">{{ $fee->status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('add_fees', $fee->student_id) }}" class="btn btn-primary btn-sm">Pay Now</a>
                            <a href="{{ route('fees.show', $fee->student_id) }}" class="btn btn-info btn-sm">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#feesTable').DataTable({
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            lengthMenu: [5, 10, 15, 20],
            responsive: true,
            autoWidth: false,
            order: [[7, 'desc']],
            columnDefs: [
                { targets: 7, type: 'date' },
                { targets: [7], visible: false }
            ],
            language: {
                searchPlaceholder: "Search records...",
                lengthMenu: "Show _MENU_ entries",
                paginate: {
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });
</script>
@endpush
