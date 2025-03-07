@extends('teacher.layout.adminlte')

@section('title', 'Attendance List')

@section('content')
<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Attendance</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="attendanceTable" class="table table-striped table-bordered">
                

                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student</th>
                            <th>Batch Time</th>
                            <th>Attendance</th>
                            <th>Marked By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        @endphp
                        <option value="{{ $time }}" {{ trim($currentBatch) == trim($time) ? 'selected' : '' }}>
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
</tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   

    <!-- Push.js for Notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js"></script>

    <script>
       

            // Attendance Marking Notification
            $('.attendance-form').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission for testing
                let studentName = $(this).closest('tr').find('td:nth-child(2)').text();
                let status = $(this).find('select[name="status"]').val();

                // Show Push Notification
                Push.create("Attendance Marked", {
                    body: studentName + " is marked as " + status,
                    icon: "{{ asset('images/attendance-icon.png') }}", // Use an actual icon
                    timeout: 4000,
                    onClick: function () {
                        window.focus();
                        this.close();
                    }
                });

                // Simulate form submission (Remove this line in actual use)
                setTimeout(() => event.target.submit(), 1000);
            });
        });

        $('.batch-select').change(function() {
    var studentId = $(this).data('student-id');
    var batchTime = $(this).val();

    $.ajax({
        url: "{{ route('attendance.update_batch') }}",
        method: "PATCH",
        data: {
            _token: "{{ csrf_token() }}",
            student_id: studentId, // Should match students_id in DB
            batch: batchTime
        },
        success: function(response) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to change the batch?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Updated!', 'The batch change request sent for approval.', 'success')
                    .then(() => {
                        location.reload(); // Refresh the page after clicking "OK"
                    });
                }
            });
        },
        error: function(xhr) {
            console.error("Error:", xhr.responseText);
        }
    });
});




    </script>
@endpush