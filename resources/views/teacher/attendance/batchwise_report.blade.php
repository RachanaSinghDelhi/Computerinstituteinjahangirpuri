@extends('teacher.layout.adminlte')

@section('title', 'Attendance Report')

@section('content')
<div class="container mt-4">
    <!-- Attendance Report Card -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4>Batch-wise Monthly Attendance Report - {{ now()->format('F Y') }}</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Batch</th>
                            <th>ID</th>
                            <th>Student Name</th>
                            @for ($i = 1; $i <= now()->daysInMonth; $i++)
                                <th>{{ $i }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $batch => $records)
                            <!-- Display Batch Row -->
                            <tr class="table-primary">
                                <td colspan="{{ now()->daysInMonth + 2 }}"><strong>{{ $batch }}</strong></td>
                            </tr>

                            @php
                                $students = collect($records)->groupBy('student_id');
                            @endphp

                            @foreach ($students as $studentId => $attendanceRecords)
                                @php
                                    $studentName = $attendanceRecords->first()->student_name;
                                @endphp
                                <tr>
                                    <td></td> <!-- Leave empty for batch row spacing -->
                                    <td>{{ $studentId }}</td>
                                    <td>{{ $studentName }}</td>
                                    @for ($i = 1; $i <= now()->daysInMonth; $i++)
                                        @php
                                            $date = now()->format('Y-m') . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                                            $attendance = $attendanceRecords->firstWhere('attendance_date', $date);
                                        @endphp
                                        <td class="text-center">
    {{ str_replace(['Present', 'Absent', 'Late'], ['P', 'A', 'L'], $attendance->status ?? '-') }}
</td>

                                    @endfor
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Summary Card -->
    <div class="card shadow-lg mt-4">
        <div class="card-header bg-success text-white text-center">
            <h4>Attendance Summary</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Batch</th>
                            <th>Student Name</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Late</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($summary as $batch => $students)
                            @foreach ($students as $studentName => $counts)
                                <tr>
                                    <td>{{ $batch }}</td>
                                    <td>{{ $studentName }}</td>
                                    <td class="text-success fw-bold">{{ $counts['Present'] }}</td>
                                    <td class="text-danger fw-bold">{{ $counts['Absent'] }}</td>
                                    <td class="text-warning fw-bold">{{ $counts['Late'] }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
