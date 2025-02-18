@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">Fee Details for {{ $student->name }}</h2>

            <!-- Link to Edit Course -->
            <form action="{{ route('fees.updateCourse', $student->student_id) }}" method="POST" class="mb-4">
                @csrf
                @method('PUT') <!-- Use PUT as per the route -->
                <div class="mb-3">
                    <label for="course_id" class="form-label"><strong>Course:</strong></label>
                    <select name="course_id" id="course_id" class="form-select">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" 
                                {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                {{ $course->course_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-pencil-square"></i> Update Course
                </button>
            </form>

            <!-- Link to Edit Total Fees -->
            <form action="{{ route('updateTotalFees', $student->student_id) }}" method="POST" class="mb-4">
                @csrf
                @method('PUT') <!-- Use PUT as per the route -->
                <div class="mb-3">
                    <label for="total_fees" class="form-label"><strong>Total Fees:</strong></label>
                    <input type="number" name="total_fees" id="total_fees" class="form-control" 
                        value="{{ $totalFees }}" min="0" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-pencil-square"></i> Update Total Fees
                </button>
            </form>

            <p><strong>Total Fees of the Course:</strong> ₹{{ $totalFees }}</p>

            @if($hasFees)
                <p><strong>Total Fees Paid:</strong> ₹{{ $student->fees->sum('amount_paid') }}</p>

                <div class="row mb-3">
    <div class="col-md-6">
        <a href="{{ route('fees.index') }}" class="btn btn-primary">
            <i class="bi bi-list"></i> View All Fees
        </a>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        <a href="{{ route('add_fees', $student->student_id) }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Fees
        </a>
    </div>
</div>


<table id="feesTable" class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Installment</th>
                            <th scope="col">Installment No.</th>
                            <th scope="col">Receipt No.</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Payment Date</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Receipt</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($student->fees as $index => $fee)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{  $fee->installment_no }}</td>
                                    <td>{{ $fee->receipt_number }}</td>
                                    <td>₹{{ $fee->amount_paid }}</td>
                                    <td>{{ \Carbon\Carbon::parse($fee->payment_date)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($fee->due_date)->format('d-m-Y') }}</td>
                                    <td>
                                        @if($fee->receipt_image)
                                            <a href="{{ asset('storage/receipts/' . $fee->receipt_image) }}" target="_blank" class="btn btn-primary btn-sm">View Receipt</a>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge 
                                            {{ $fee->status == 'Paid' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $fee->status }}
                                        </span>
                                    </td>
                                    <td>
                                    <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-warning btn-sm mb-1">
        <i class="bi bi-pencil"></i> Edit
    </a>
                                        <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this fee record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning mt-4" role="alert">
                    <strong>No fees submitted yet for this student.</strong>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Include jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#feesTable').DataTable({
            "order": [[1, "desc"]], // Sort by Payment Date in Descending Order
            "paging": true,
            "searching": true,
            "info": true
        });
    });
</script>
@endpush