@extends('dashboard.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Dashboard Overview</h2>
    
    <div class="row">
        <div class="col">
            <h3>Fees Overdue</h3>
    @if(count($overdueFees) > 0)
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
        @foreach($overdueFees as $fee)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Overdue Fees Alert!</strong><br>
                Student: <b>{{ $fee->name }}</b> (ID: {{ $fee->student_id }})<br>
                Due Date: {{ \Carbon\Carbon::parse($fee->due_date)->format('d M Y') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
</div>
    </div>
</div>
@endif

    <div class="row">
        <!-- Total Fees Received -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Fees Received</div>
                <div class="card-body">
                    <h4 class="card-title">₹{{ number_format($totalFeesReceived, 2) }}</h4>
                </div>
            </div>
        </div>

        <!-- Fees Pending -->
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Fees Pending (This Month)</div>
                <div class="card-body">
                    <h4 class="card-title">₹{{ number_format($feesPending, 2) }}</h4>
                </div>
            </div>
        </div>

        <!-- Active Students -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Active Students</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $activeStudents }}</h4>
                </div>
            </div>
        </div>

        <!-- New Enrollments -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">New Enrollments (This Month)</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $newEnrollments }}</h4>
                </div>
            </div>
        </div>

        <!-- Completed/Left Students -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Completed/Left (This Month)</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $completedOrLeftStudents }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Fees and Enrollment Graphs -->
    <div class="row mt-5">
        <div class="col-md-6">
            <canvas id="feesChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="enrollmentChart"></canvas>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Monthly Fees Data
    var feesCtx = document.getElementById('feesChart').getContext('2d');
    var feesChart = new Chart(feesCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Total Fees Received',
                data: @json(array_values($monthlyFees)),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Monthly Enrollments Data
    var enrollCtx = document.getElementById('enrollmentChart').getContext('2d');
    var enrollChart = new Chart(enrollCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'New Enrollments',
                data: @json(array_values($monthlyEnrollments)),
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@endpush
