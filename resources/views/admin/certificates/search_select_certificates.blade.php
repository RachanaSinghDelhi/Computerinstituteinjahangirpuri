@foreach ($certificates as $certificate)
    <div class="col-md-6 mb-3 certificate-item">
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

<div class="row" id="certificateCardRow">
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
