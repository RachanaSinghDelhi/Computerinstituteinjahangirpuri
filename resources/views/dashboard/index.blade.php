@extends('dashboard.layout.adminlte')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>Dashboard Overview</h1>
@stop

@section('content')
<div class="container-fluid">
    @if(isset($overdueFees) && count($overdueFees) > 0)
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
        @foreach($overdueFees as $fee)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>⚠️ Fees Overdue Alert!</strong><br>
                <b>Student:</b> {{ $fee->student_name }} (ID: {{ $fee->student_id }})<br>
                <b>Due Date:</b> {{ \Carbon\Carbon::parse($fee->due_date)->format('d M Y') }}<br>
                <b>Pending Amount:</b> ₹{{ number_format($fee->fees_due, 2) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    </div>
    @endif

    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>₹{{ number_format($totalFeesReceived, 2) }}</h3>
                    <p>Total Fees Received</p>
                </div>
                <div class="icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <a href="{{ route('fees.received') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>₹{{ number_format($feesPending, 2) }}</h3>
                    <p>Fees Pending (This Month)</p>
                </div>
                <div class="icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <a href="{{ route('fees.pending') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $activeStudents }}</h3>
                    <p>Active Students</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Monthly Fees Received</div>
                <div class="card-body">
                    <canvas id="feesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">New Enrollments</div>
                <div class="card-body">
                    <canvas id="enrollmentChart"></canvas>
                </div>
            </div>
        </div>


        <div class="col-md-4">
        <div class="card">
            <div class="card-header">Completed/Left Students</div>
            <div class="card-body">
                <canvas id="completedLeftChart"></canvas>
            </div>
        </div>
    </div>

</div>
    </div>
    <!-- New Chart for Completed/Left Students -->

 
@stop

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
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


    var completedLeftCtx = document.getElementById('completedLeftChart').getContext('2d');
var completedLeftChart = new Chart(completedLeftCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Completed/Left Students',
            data: @json(array_values($completedOrLeftStudents)),
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
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
