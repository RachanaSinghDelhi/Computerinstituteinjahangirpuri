@extends('students.layout.adminlte')
@section('title', 'Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Student Profile</h4>
                </div>
                <div class="card-body">
                    {{-- Success/Error Message Section --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('storage/students/' . $student->photo) }}" alt="Student Photo" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-md-8">
                            <h5 class="fw-bold">{{ $student->name }}</h5>
                            <p><strong>Father's Name:</strong> {{ $student->father_name }}</p>
                            <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
                            <p><strong>Contact Number:</strong> {{ $student->contact_number }}</p>
                            <p><strong>Admission Date:</strong> {{ $student->doa }}</p>
                            <p><strong>Current Batch:</strong> {{ $student->batch }}</p>
                            <p><strong>Course:</strong> {{ $student->course->course_name ?? 'N/A' }}</p>
                            <p><strong>Course Status:</strong> <span class="badge bg-info">{{ ucfirst($student->course_status) }}</span></p>
                        </div>
                    </div>

                    <hr>

                    <h5 class="text-center">Request Batch Change</h5>
                    <form action="{{ route('batch.change.request', $student->student_id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="new_batch" class="form-label">Select New Batch</label>
                            <select name="batch" id="new_batch" class="form-control" required>
                                <option value="">-- Select Batch --</option>
                                <option value="{{ $student->batch }}" selected>{{ $student->batch }}</option>
                                @for ($hour = 8; $hour <= 19; $hour++)
                                    @php
                                        $formattedHour = str_pad(($hour <= 12 ? $hour : $hour - 12), 2, '0', STR_PAD_LEFT);
                                        $suffix = ($hour < 12) ? 'AM' : 'PM';
                                        $time = ($hour == 12) ? "12:00 PM" : "{$formattedHour}:00 {$suffix}";
                                    @endphp
                                    @if ($time !== $student->batch)
                                        <option value="{{ $time }}">{{ $time }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>

                        {{-- Approval Pending Message --}}
                        @if(session('approval_pending'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                Your batch change request is pending approval.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Request Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection