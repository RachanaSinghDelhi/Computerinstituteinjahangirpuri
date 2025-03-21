@extends('dashboard.layout.adminlte')
@section('title', 'Fees Status')

@section('content')

<div class="container">
    <h1>Student Fees Status</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Receipts -->
    <div class="container mt-4">
        <h1 class="text-center">Upload Receipts</h1>
        <form action="{{ route('receipts.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input for starting number -->
            <div class="mb-3">
                <label for="starting_number" class="form-label">Starting Number:</label>
                <input type="number" name="starting_number" id="starting_number" class="form-control" required>
            </div>

            <!-- File input -->
            <div class="mb-3">
                <label for="receipts" class="form-label">Select Receipts:</label>
                <input type="file" name="receipts[]" id="receipts" class="form-control" multiple required>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    <div>
        <br>
        <a href="{{ route('students.create') }}">
            <button class="btn btn-sm btn-success">Add New Student</button>
        </a>
    </div>
    <!-- Fees Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Fees List</h3>
        </div>

        
        <div class="card-body">
    <div class="mt-4 table-responsive" >
        <table id="feesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>DOA</th>
                    <th>Admission Date </th>
                    <th>Course Name</th>
               
                    <th  class="d-none d-md-table-cell">Update & Calculate Total Fees</th>
                    <th  class="d-none d-md-table-cell">Ins.</th>
                    <th>Ins. Paid</th>
                    <th  class="d-none d-md-table-cell">Fees Paid</th>
                    <th  class="d-none d-md-table-cell">Fees Due</th>
                    <th  class="d-none d-md-table-cell">Updated at</th>
                 
                    <th>Status</th>
                    <th>Actions</th>
               
                </tr>
            </thead>
            <tbody>
                @foreach($feesData as $fee)
                    <tr>
                        <td>{{ $fee->student_id }}</td>
                        <td>{{ $fee->student_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($fee->admission_date)->format('d') }}</td>
                        <td>{{ \Carbon\Carbon::parse($fee->admission_date)->format('d-m-y') }}</td>
                        <td>
                            <form action="{{ route('fees.updateCourse', $fee->student_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="course_id" class="form-control" onchange="this.form.submit()">
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" @if($course->id == $fee->course_id) selected @endif>
                                            {{ $course->course_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td class="d-none d-md-table-cell">
    <form action="{{ route('updateTotalFees', $fee->student_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="input-group">
            <input type="number" id="total_fees_{{ $fee->student_id }}" name="total_fees" 
                   value="{{ $fee->student_total_fees }}" class="form-control" required>
                   <button type="button" class="btn btn-secondary calculate-btn" 
                    data-target="#total_fees_{{ $fee->student_id }}">
                🧮
            </button>
        <button type="submit" class="btn btn-sm btn-primary mt-2">Update Fees</button>
        </div>
        
    </form>
</td>


                        <td  class="d-none d-md-table-cell">{{ $fee->installments }}</td>
                        <td>{{ $fee->installments_paid }}</td> <!-- Display number of paid installments -->
                        <td  class="d-none d-md-table-cell">{{ $fee->fees_paid }}</td>
                        <td  class="d-none d-md-table-cell">{{ $fee->fees_due }}</td>
                        <td  class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse( $fee->last_updated)->format('d-m-y') }}</td>
                     
                        @php
    $displayStatus = $fee->status == 'Paid but Pending Next Month' ? 'Paid but Pending' : $fee->status;
    $statusClass = $fee->status == 'Paid' ? 'bg-success' : ($fee->status == 'Paid but Pending Next Month' ? 'bg-warning' : 'bg-danger');
@endphp

<td>
    <span class="badge {{ $statusClass }}">{{ $displayStatus }}</span>
</td>
                        <td>
                            <a href="{{ route('add_fees', $fee->student_id) }}" class="btn btn-primary btn-sm">Pay</a>
                            <a href="{{ route('fees.show', $fee->student_id) }}" class="btn btn-info btn-sm">View</a>
                            
                            @php
    // Fetch student's WhatsApp number from the students table
    $student = \App\Models\Student::find($fee->student_id);
    $whatsappNumber = $student ? $student->contact_number : '9625277739'; // Default if not found

    // Remove any spaces from the WhatsApp number
    $whatsappNumber = str_replace(' ', '', $whatsappNumber);

    // Ensure the number starts with +91
    if (!preg_match('/^\+91/', $whatsappNumber)) {
        $whatsappNumber = '+91' . ltrim($whatsappNumber, '0'); // Remove leading zero if present
    }
@endphp


@php
    $installmentAmount = ($fee->student_total_fees - 350) / max($fee->installments, 1);
    $studentName = urldecode(urlencode($fee->student_name)); // Decode the URL-encoded name
    $message = "Hello " . $studentName . ", your pending installment is Rs. " . number_format($installmentAmount, 2) . ". Please pay soon to avoid a fine of Rs. 200 per week.\n\nPay via Google Pay:\n👉 https://pay.google.com\n\nScan the QR Code:\n👉 https://www.nicewebtechnologies.com/qrcode.jpg";
@endphp

<a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode($message) }}" 
   target="_blank"
   class="btn btn-success btn-sm">
   📲 WhatsApp
</a>




                        </td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    </div></div>
@endsection

@push('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@push('js')
    <!-- jQuery (Ensure it's loaded) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        $('#feesTable').DataTable({
            responsive:true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            lengthMenu: [5, 10, 15, 20, 50],
            order: [[0, 'desc']],
            
            language: {
                searchPlaceholder: "Search courses...",
                lengthMenu: "Show _MENU_ entries",
                paginate: { next: "Next", previous: "Previous" }
            }
        });
    



        $('.calculate-btn').click(function () {
            let targetInput = $(this).data('target');

            let calcHtml = `
                <div id="calc-container">
                    <input type="text" id="calc-display" class="form-control mb-2" readonly>
                    <div class="d-grid gap-2">
                        <div class="row">
                            ${[7, 8, 9, '/'].map(val => `<button class="btn btn-light col calc-btn" data-value="${val}">${val}</button>`).join('')}
                        </div>
                        <div class="row">
                            ${[4, 5, 6, '*'].map(val => `<button class="btn btn-light col calc-btn" data-value="${val}">${val}</button>`).join('')}
                        </div>
                        <div class="row">
                            ${[1, 2, 3, '-'].map(val => `<button class="btn btn-light col calc-btn" data-value="${val}">${val}</button>`).join('')}
                        </div>
                        <div class="row">
                            ${[0, '.', '=', '+'].map(val => `<button class="btn btn-light col calc-btn" data-value="${val}">${val}</button>`).join('')}
                        </div>
                        <button class="btn btn-danger w-100 mt-2" id="calc-clear">Clear</button>
                    </div>
                </div>
            `;

            // Open Bootstrap Modal
            let modalHtml = `
                <div class="modal fade" id="calculatorModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Calculator</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">${calcHtml}</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="calc-ok">OK</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Remove old modal and append new
            $('#calculatorModal').remove();
            $('body').append(modalHtml);

            // Show modal
            var modal = new bootstrap.Modal(document.getElementById('calculatorModal'));
            modal.show();

            // Calculator Logic
            let calcDisplay = $('#calc-display');

            $(document).on('click', '.calc-btn', function () {
                let value = $(this).data('value');
                if (value === '=') {
                    try {
                        calcDisplay.val(eval(calcDisplay.val()));
                    } catch (e) {
                        calcDisplay.val('Error');
                    }
                } else {
                    calcDisplay.val(calcDisplay.val() + value);
                }
            });

            $('#calc-clear').click(function () {
                calcDisplay.val('');
            });

            $('#calc-ok').click(function () {
                let result = calcDisplay.val();
                $(targetInput).val(result);
                modal.hide();
            });

        });
    });
</script>
@endpush
