@extends('teacher.layout.adminlte')

@section('title', 'Attendance List')

@section('content')
<div class="container">
    <h2>Attendance Management</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Batch Time</th>
                <th>Attendance</th>
                <th>Marked By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->batch }}</td>
                    <td>
                        @php
                            $attendance = $student->attendances->first();
                        @endphp
                        @if($attendance)
                            <span class="badge bg-success">{{ $attendance->status }}</span>
                        @else
                            <span class="badge bg-danger">Not Marked</span>
                        @endif
                    </td>
                    <td>
                        {{ $attendance->user->name ?? 'N/A' }}
                    </td>
                    <td>
                        @if(!$attendance)
                        <form action="{{ route('teacher.attendance.mark') }}" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <input type="hidden" name="batch" value="{{ $student->batch }}">
                            <select name="status" class="form-control" required>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Late">Late</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Mark</button>
                        </form>
                        @else
                            <button class="btn btn-success" disabled>✔ Marked</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
