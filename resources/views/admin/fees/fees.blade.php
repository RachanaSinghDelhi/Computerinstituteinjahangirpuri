@extends('admin.app')

@section('content')

<div class="container">
    <h1>Student Fees Status</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    
    <div>
        <br>
        <a href="{{ route('admin.students.add') }}">
            <button class="btn btn-sm btn-success">Add New Student</button>
        </a>
    </div>
    <!-- Fees Table -->
    <div class="mt-4">
        <table id="feesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Admission Date</th>
                    <th>Admission Date</th>
                    <th>Course Name</th>
               
                    <th  class="d-none d-md-table-cell">Total Fees</th>
                    <th  class="d-none d-md-table-cell">Installments</th>
                    <th>Installments Paid</th>
                    <th  class="d-none d-md-table-cell">Fees Paid</th>
                    <th  class="d-none d-md-table-cell">Fees Due</th>
                    <th class="text-muted">Last Updated</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feesData as $fee)
                    <tr>
                        <td>{{ $fee->student_id }}</td>
                        <td>{{ $fee->student_name }}</td>
                        <td>{{ $fee->admission_date }}</td>
                        <td>{{ \Carbon\Carbon::parse($fee->admission_date)->format('d') }}</td>
                        <td>
                            <form action="{{ route('admin.fees.updateCourse', $fee->student_id) }}" method="POST">
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
                        {{ $fee->total_fees }}
</td>


                        <td  class="d-none d-md-table-cell">{{ $fee->installments }}</td>
                        <td>{{ $fee->installments_paid }}</td> <!-- Display number of paid installments -->
                        <td  class="d-none d-md-table-cell">{{ $fee->fees_paid }}</td>
                        <td  class="d-none d-md-table-cell">{{ $fee->fees_due }}</td>
                        <td class="text-muted">{{ $fee->last_updated }}</td>
                        <td>
                            <span class="badge 
                                @if($fee->status == 'Paid') 
                                    bg-success 
                                @elseif($fee->status == 'Paid but Pending Next Month') 
                                    bg-warning 
                                @else 
                                    bg-danger 
                                @endif
                            ">{{ $fee->status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.add_fees', $fee->student_id) }}" class="btn btn-primary btn-sm">Pay Now</a>
                            <a href="{{ route('admin.fees.show', $fee->student_id) }}" class="btn btn-info btn-sm">Details</a>
                            
                            @php
    // Fetch student's WhatsApp number from the students table
    $student = \App\Models\Student::find($fee->student_id);
    $whatsappNumber = $student ? $student->contact_number : '9625277739'; // Default if not found

    // Remove any spaces from the WhatsApp number
    $whatsappNumber = str_replace(' ', '', $whatsappNumber);
@endphp

@php
    $installmentAmount = ($fee->student_total_fees - 350) / max($fee->installments, 1);
    $studentName = urldecode(urlencode($fee->student_name)); // Decode the URL-encoded name
    $message = "Hello " . $studentName . ", your pending installment is Rs. " . number_format($installmentAmount, 2) . ". Please pay soon to avoid a fine of Rs. 200 per week.\n\nPay via Google Pay:\n👉 https://pay.google.com\n\nScan the QR Code:\n👉 https://www.nicewebtechnologies.com/qrcode.jpg";
@endphp

<a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode($message) }}" 
   target="_blank"
   class="btn btn-success btn-sm">
   📲Reminder
</a>




                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')

   
   


<script>
    $(document).ready(function() {

        $('#feesTable').DataTable({
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            lengthMenu: [5, 10, 15, 20],
            responsive: true,
            autoWidth: false,
            order: [[7, 'desc']],
            columnDefs: [
                { targets: 7, type: 'date' },
                { targets: [7], visible: false }
            ],
            language: {
                searchPlaceholder: "Search records...",
                lengthMenu: "Show _MENU_ entries",
                paginate: {
                    next: "Next",
                    previous: "Previous"
                }
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
