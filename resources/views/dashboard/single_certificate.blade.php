@if(isset($certificate))
    <div class="certificate">
        <img src="{{ asset('storage/photos/' . $certificate->photo) }}" alt="Student Photo" style="max-width: 100px;">
        <h1>Certificate of Completion</h1>
        <p><strong>Name:</strong> {{ $certificate->name }}</p>
        <p><strong>Father's Name:</strong> {{ $certificate->father_name }}</p>
        <p><strong>Course:</strong> {{ $certificate->course->title }}</p>
        <p><strong>Duration:</strong> {{ $certificate->duration }} months</p>
        <p><strong>Description:</strong> {{ $certificate->desc }}</p>
        <p><strong>Grade:</strong> {{ $certificate->grade }}</p>
        <p><strong>Certificate Number:</strong> {{ $certificate->certificate }}</p>
        <p><strong>Code:</strong> {{ $certificate->code }}</p>
        <p><strong>Date Issued:</strong> {{ $certificate->date->format('d-m-Y') }}</p>
    </div>
@endif
