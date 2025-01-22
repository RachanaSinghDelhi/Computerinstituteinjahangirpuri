@extends('dashboard.app')
@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">Fee Details for {{ $student->name }}</h2>

            @if($hasFees)
                <p><strong>Course:</strong> {{ optional($student->fees->first()->course)->course_title ?? 'No Course Assigned' }}</p>
                <p><strong>Total Fees Paid:</strong> ₹{{ $student->fees->sum('amount_paid') }}</p>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Installment</th>
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
                                    <td>₹{{ $fee->amount_paid }}</td>
                                    <td>{{ \Carbon\Carbon::parse($fee->payment_date)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($fee->payment_date)->addMonth()->format('d-m-Y') }}</td>
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
