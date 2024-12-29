@extends('dashboard.app')
@section('title', 'Student ID Cards')
@section('content')

<div class="container mt-4">






    <h1>Selected Certificates</h1>


<div class="container">


<!-- Form for selecting and downloading certificates -->
<form action="{{ route('certificates.downloadSelected') }}" method="POST">
    @csrf
    <div class="row">
        @foreach($certificates as $certificate)
            <div class="col-md-6 mb-3">
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="selected_certificates[]" 
                        value="{{ $certificate->id }}" 
                        id="certificate-{{ $certificate->id }}"
                    >
                    <label class="form-check-label" for="certificate-{{ $certificate->student_id }}">
    <strong>{{ $certificate->name }}</strong> 
    (ID: {{ $certificate->student_id }}, 
    Date: 
    @if (!empty($certificate->date))
        {{ \Carbon\Carbon::parse($certificate->date)->format('d M Y') }}
    @else
        'N/A'
    @endif)
</label>
                </div>
            </div>
        @endforeach
        <div class="mt-4">
        {{ $certificates->links('pagination::bootstrap-4') }}
    </div>

    </div>

    <!-- Display error message if no IDs are selected -->
    @if($errors->has('selected_certificates'))
        <div class="alert alert-danger">
            {{ $errors->first('selected_certificates') }}
        </div>
    @endif

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary mt-3">Download Selected Certificates</button>
</form>



</div>


<div class="row">
    @foreach ($certificates as $certificate)
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <div class="certificate card">
                <div class="card-body">
                    <h5 class="card-title">Certificate for {{ $certificate->name }}</h5>
                    <div class="certificate-info">
                        <strong>Course:</strong> {{ $certificate->course ?? 'N/A' }}<br />
                        <strong>Issued On:</strong> {{ $certificate->dt ?? 'N/A' }}<br />
                        <strong>Certificate Type:</strong> {{ $certificate->certificate_type ?? 'N/A' }}<br />
                        <strong>Duration:</strong> {{ $certificate->duration ?? 'N/A' }} months<br />
                        <strong>Grade:</strong> {{ $certificate->grade ?? 'N/A' }}<br />
                        <strong>Code:</strong> {{ $certificate->code ?? 'N/A' }}<br />
                        <strong>Description:</strong> {{ $certificate->description ?? 'N/A' }}<br />
                    </div>

                    @if($certificate->photo)
                        <p><strong>Photo:</strong> <img src="{{ asset('storage/students/' . $certificate->photo) }}" alt="Certificate Photo" width="100" class="img-fluid" /></p>
                    @endif
                    <a href="{{ route('dashboard.certificates.view', $certificate->id) }}" target="_blank" class="btn btn-primary btn-sm">View Certificate</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>
<div class="mt-4">
        {{ $certificates->links('pagination::bootstrap-4') }}
    </div>
@endsection
