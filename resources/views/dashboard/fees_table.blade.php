<!-- resources/views/dashboard/fees_table.blade.php -->
@foreach($students as $student)
<tr id="student-{{ $student->id }}">
    <td>{{ $student->student_id }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->doa }}</td>
    <td>{{ $student->course->course_title }}</td>
    <td>{{ $student->course->total_fees }}</td>
    <td>{{ $student->fees->sum('amount_paid') }}</td>
    <td>{{ $student->course->total_fees - $student->fees->sum('amount_paid') }}</td>
    <td>
        @php
            $paidAmount = $student->fees->sum('amount_paid');
            $totalFee = $student->course->total_fees;
            echo $paidAmount >= $totalFee ? 'Paid' : 'Pending';
        @endphp
    </td>
    <td>
        <a href="{{ route('dashboard.single_fees', $student->id) }}" class="btn btn-info">Details</a>
        <a href="{{ route('dashboard.add_fees', $student->id) }}" class="btn btn-primary">Pay Fee</a>
        <button class="btn btn-danger delete-btn" data-id="{{ $student->id }}">Delete</button>
    </td>
</tr>
@endforeach
