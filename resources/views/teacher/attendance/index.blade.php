@extends('teacher.layout.adminlte')

@section('title', 'Attendance List')

@section('content')
<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Attendance</h3>
            <div class="d-flex">
                <input type="text" id="searchInput" class="form-control me-2" placeholder="Search Student...">
                <select id="batchFilter" class="form-control">
    <option value="">Filter by Batch</option>
    @for ($hour = 8; $hour <= 20; $hour++)
        @php
            // Format hours with leading zero for consistency (08:00 AM instead of 8:00 AM)
            $formattedHour = str_pad(($hour <= 12 ? $hour : $hour - 12), 2, '0', STR_PAD_LEFT);
            $suffix = ($hour < 12) ? 'AM' : 'PM';
            $time = ($hour == 12) ? "12:00 PM" : "{$formattedHour}:00 {$suffix}";
        @endphp
        <option value="{{ $time }}">{{ $time }}</option>
    @endfor
</select>

            </div>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table id="attendanceTable" class="table table-striped table-bordered">

                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student</th>
                            <th class="d-none d-md-table-cell">Batch Time</th>
                            <th>Attendance</th>
                            <th class="d-none d-md-table-cell">Marked By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="filterbatch">
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

    <form class="attendance-form" action="{{ route('teacher.attendance.mark') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->student_id }}">
        <input type="hidden" name="batch" value="{{ $student->batch }}">
        <div class="d-flex">
            <select name="status" class="form-control form-select me-2" required>
                <option value="Present" {{ $attendance && $attendance->status == 'Present' ? 'selected' : '' }}>Present</option>
                <option value="Absent" {{ $attendance && $attendance->status == 'Absent' ? 'selected' : '' }}>Absent</option>
                <option value="Late" {{ $attendance && $attendance->status == 'Late' ? 'selected' : '' }}>Late</option>
            </select>
            <button type="submit" class="btn {{ $attendance ? 'btn-success' : 'btn-primary' }}">
    {!! $attendance ? '✔ Update' : 'Mark' !!}
</button>

        </div>
    </form>
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
            $(document).ready(function() {

                $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#attendanceTable tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

    
   
      
        $('#batchFilter').on('change', function () {
        var batch = $(this).val()?.trim() || "";

        $.ajax({
            url: "{{ route('attendance.filter') }}", // Change to your actual route
            type: "GET",
            data: { batch:batch },
            
            success: function (response) {
                $('#filterbatch').html(response); // Update table with new data
               
            },
            error: function (xhr, status, error) {
            console.error("AJAX Error:", xhr.responseText);
           
        }
        });
    });
/*

    $('#batchFilter').change(function () {
        var selectedBatch = $(this).val()?.trim() || ""; // Get selected batch

        $('#attendanceTable tbody tr').each(function () {
            var rowBatch = $(this).find('td select.batch-select option:selected').val(); // Get batch from row

            if (typeof rowBatch !== "undefined" && rowBatch !== null) {
                rowBatch = rowBatch.trim(); // Only trim if not undefined/null
            } else {
                rowBatch = ""; // Default to empty string if undefined
            }

            console.log("Row Batch:", rowBatch, "| Selected Batch:", selectedBatch); // Debugging

            // Show row if batch matches or filter is empty
            $(this).toggle(selectedBatch === "" || rowBatch === selectedBatch);
        });
    });


*/


            // Mark attendance on form submission
            // Remove this line in actual use and replace it with a real form submission event
            $('.attendance-form').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission for testing
                let studentName = $(this).closest('tr').find('td:nth-child(2)').text();
                let status = $(this).find('select[name="status"]').val();

                // Show Push Notification
                Push.create("Attendance Marked", {
                    body: studentName + " is marked as " + status,
                 
                    timeout: 4000,
                    onClick: function () {
                        window.focus();
                        this.close();
                    }
                });

                // Simulate form submission (Remove this line in actual use)
                setTimeout(() => event.target.submit(), 1000);
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


            });

    </script>
@endpush