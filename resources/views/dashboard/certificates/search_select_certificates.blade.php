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
