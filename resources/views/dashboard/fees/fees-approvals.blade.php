@extends('dashboard.layout.adminlte')
@section('title', 'Approve Fees')
@section('content')
<div class="container">
    <h2>Pending Fees Approval</h2>
    <!-- Display Success or Error Messages -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Course ID</th>
                <th>Payment Date</th>
                <th>Due Date</th>
                <th>Amount Paid</th>
                <th>Balances</th>
                <th>Receipt Number</th>
                <th>Receipt Image</th>
                <th>Status</th>
                <th>Installment No</th>
                <th>Added By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingFees as $fee)
                <tr>
                    <td>{{ $fee->id }}</td>
                    <td>{{ $fee->student_id }}</td>
                    <td>{{ $fee->course_id }}</td>
                    <td>{{ $fee->payment_date }}</td>
                    <td>{{ $fee->due_date }}</td>
                    <td>{{ $fee->amount_paid }}</td>
                    <td>{{ $fee->balances }}</td>
                    <td>{{ $fee->receipt_number }}</td>
                    <td>
                        @if($fee->receipt_image)
                            <img src="{{ asset('storage/' . $fee->receipt_image) }}" width="50" height="50" alt="Receipt">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $fee->status }}</td>
                    <td>{{ $fee->installment_no }}</td>
                    <td>{{ $fee->added_by }}</td>
                    <td>
                        <form action="{{ route('pending.fees.approve', $fee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('pending.fees.reject', $fee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
