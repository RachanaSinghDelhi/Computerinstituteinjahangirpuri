<!-- resources/views/dashboard/fees_table.blade.php -->
@foreach($students as $student)
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th class="d-none d-md-table-cell" scope="col">Date of Admission</th>
                <th scope="col">Course Title</th>
                <th class="d-none d-md-table-cell" scope="col">Total Fees</th>
                <th class="d-none d-md-table-cell" scope="col">Amount Paid</th>
                <th class="d-none d-md-table-cell" scope="col">Balance</th>
                <th class="d-none d-md-table-cell" scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr id="student-{{ $student->id }}">
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->name }}</td>
                <td class="d-none d-md-table-cell">{{ $student->doa }}</td>
                <td>{{ $student->course->course_title }}</td>
                <td class="d-none d-md-table-cell">{{ $student->course->total_fees }}</td>
                <td class="d-none d-md-table-cell">{{ $student->fees->sum('amount_paid') }}</td>
                <td class="d-none d-md-table-cell">{{ $student->course->total_fees - $student->fees->sum('amount_paid') }}</td>
                <td class="d-none d-md-table-cell">
                    @php
                        $paidAmount = $student->fees->sum('amount_paid');
                        $totalFee = $student->course->total_fees;
                        echo $paidAmount >= $totalFee ? 'Paid' : 'Pending';
                    @endphp
                </td>
                <td>
                    <a href="{{ route('fees.single_fees', $student->id) }}" class="btn btn-info btn-sm">Details</a>
                    <a href="{{ route('fees.add_fees', $student->id) }}" class="btn btn-primary btn-sm">Pay Fee</a>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $student->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endforeach
