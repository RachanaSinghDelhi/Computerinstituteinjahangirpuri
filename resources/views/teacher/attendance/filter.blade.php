@php
        $previousBatch = null;
    @endphp
    @php
$sortedStudents = $students->sortBy(function($student) {
    if (preg_match('/(\d+):00\s(AM|PM)/', $student->batch, $matches)) {
        $hour = (int) $matches[1];

        // Convert to 24-hour format
        if ($matches[2] == 'PM' && $hour != 12) {
            $hour += 12;
        } elseif ($matches[2] == 'AM' && $hour == 12) {
            $hour = 0;
        }

        // Return time in HHMM format for proper sorting
        return sprintf('%02d00', $hour);
    }
    return '9999'; // Ensure missing or invalid batch times appear last
});
@endphp


@foreach($sortedStudents as $student)

        @php
            // Fetch batch details
            $currentBatch = $student->batch ?? 'Not Assigned';

            $studentVersion = \App\Models\StudentVersion::where('student_id', $student->student_id)
                ->latest('created_at')
                ->first();

            $pendingBatch = $studentVersion ? optional(json_decode($studentVersion->new_data, true))['batch'] : null;
            $batchStatus = $studentVersion->status ?? 'pending';
        @endphp

        {{-- Show batch separator --}}
        @if ($currentBatch !== $previousBatch)
            <tr class="table-info">
                <td colspan="6" class="text-center fw-bold">
                    🕒 Batch Time: {{ $currentBatch }}
                </td>
            </tr>
            @php
                $previousBatch = $currentBatch;
            @endphp
        @endif

        <tr>
            <td>{{ $student->student_id }}</td>
            <td>{{ $student->name }}</td>
            <td class="d-none d-md-table-cell">
            <select name="batch" class="form-control form-control-sm batch-select" data-student-id="{{ $student->student_id }}">
    <option value="">Select Batch</option>
    @for ($hour = 8; $hour <= 20; $hour++)
        @php
            // Format hours with leading zero for consistency (08:00 AM instead of 8:00 AM)
            $formattedHour = str_pad(($hour <= 12 ? $hour : $hour - 12), 2, '0', STR_PAD_LEFT);
            $suffix = ($hour < 12) ? 'AM' : 'PM';
            $time = ($hour == 12) ? "12:00 PM" : "{$formattedHour}:00 {$suffix}";

            $selectedBatch = $pendingBatch ? trim($pendingBatch) : trim($currentBatch); // Use pendingBatch if available
        @endphp
        <option value="{{ $time }}" {{ trim($selectedBatch) == trim($time) ? 'selected' : '' }}>
            {{ $time }}
        </option>
    @endfor
</select>

    <span>
        <strong>Current Batch:</strong> {{ $currentBatch }}
        @if($pendingBatch)
            <strong class="batch-status" style="color: {{ $batchStatus == 'approved' ? 'green' : 'orange' }};">
                ({{ ucfirst($batchStatus) }}: {{ $pendingBatch }})
            </strong>
        @endif
    </span>
</td>

<td>
    @php
        // Ensure we're checking attendance for today's date
        $attendance = $student->attendances->where('attendance_date', now()->toDateString())->first();
    @endphp

    @if($attendance)
        <span class="badge bg-success">{{ $attendance->status }}</span>
    @else
        <span class="badge bg-danger">Not Marked</span>
    @endif
</td>

            <td class="d-none d-md-table-cell">{{ $attendance->user->name ?? 'N/A' }}</td>
            <td>
    @php
        $attendance = \App\Models\Attendance::where('student_id', $student->student_id)
            ->whereDate('attendance_date', now()->toDateString())
            ->first();
    @endphp

    @if(!$attendance)
        <form class="attendance-form" action="{{ route('teacher.attendance.mark') }}" method="POST">
            @csrf
            <input type="hidden" name="student_id" value="{{ $student->student_id }}">
            <input type="hidden" name="batch" value="{{ $student->batch }}">
            <div class="d-flex">
                <select name="status" class="form-control form-select me-2" required>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Late">Late</option>
                </select>
                <button type="submit" class="btn btn-primary">Mark</button>
            </div>
        </form>
    @else
        <button class="btn btn-success" disabled>✔ Marked</button>
    @endif
</td>

        </tr>
    @endforeach