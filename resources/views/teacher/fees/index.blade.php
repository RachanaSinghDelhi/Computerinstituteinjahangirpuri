@extends('teacher.layout.adminlte')

@section('title', 'Fee Records')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Fees Records</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <h4>Pending Fees</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Student Id</th>
                        <th>Course</th>
                        <th>Amount Paid</th>
                        <th>Installment</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingFees as $fee)
                    <tr>
                        <td>{{ $fee->student->name }}</td>
                        <td>{{ $fee->student->student_id }}</td>
                        <td>{{ $fee->course->name ?? 'N/A' }}</td> <!-- Fix here -->
                        <td>{{ $fee->amount_paid }}</td>
                        <td>{{ $fee->installment_no }}</td>
                        <td>{{ $fee->payment_date }}</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>
                            <a href="{{ route('teacher.fees.edit', $fee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                        <td>
   
        <a href="{{ route('teacher.fees.create', $fee->id) }}" class="btn btn-primary">Add Fees</a>


        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h4>Approved Fees</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Student ID</th>
                        <th>Course</th>
                        <th>Amount Paid</th>
                        <th>Installment</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvedFees as $fee)
                    <tr>
                        <td>{{ $fee->student->name }}</td>
                        <td>{{ $fee->student->student_id }}</td>
                        <td>{{ $fee->course->title }}</td>
                        <td>{{ $fee->amount_paid }}</td>
                        <td>{{ $fee->installment_no }}</td>
                        <td>{{ $fee->payment_date }}</td>
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>
  
        <a href="{{ route('teacher.fees.create', $fee->student->student_id ) }}" class="btn btn-primary">Add Fees</a>


        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
