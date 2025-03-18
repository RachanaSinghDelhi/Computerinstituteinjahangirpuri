@extends('admin.layout.adminlte')
@section('title', 'Payments List')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Payments List</h2>

    <!-- Display Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Transaction ID</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $key => $payment)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $payment->student->name }}</td>
                <td>{{ $payment->transaction_id }}</td>
                <td>₹{{ number_format($payment->amount, 2) }}</td>
                <td>{{ ucfirst($payment->method) }}</td>
                <td>
                    @if($payment->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-warning">Pending</span>
                    @endif
                </td>
                <td>
                    @if($payment->status == 'pending')
                        <form action="{{ route('admin.approve.payment', $payment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                    @else
                        <button class="btn btn-secondary btn-sm" disabled>Approved</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
