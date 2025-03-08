
@php
        $previousBatch = null;
    @endphp
    @foreach($students->sortBy('batch') as $student)
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
            <td>
    <select name="batch" class="form-control form-control-sm batch-select" data-student-id="{{ $student->student_id }}">
        <option value="">Select Batch</option>
        @for ($hour = 8; $hour <= 20; $hour++)
            @php
                $time = ($hour < 12) ? $hour.':00 AM' : (($hour == 12) ? '12:00 PM' : ($hour - 12).':00 PM');
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
                    $attendance = $student->attendances->first();
                @endphp
                @if($attendance)
                    <span class="badge bg-success">{{ $attendance->status }}</span>
                @else
                    <span class="badge bg-danger">Not Marked</span>
                @endif
            </td>
            <td>{{ $attendance->user->name ?? 'N/A' }}</td>
            <td>
                @if(!$attendance)
                <form class="attendance-form" action="{{ route('teacher.attendance.mark') }}" method="POST">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
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
