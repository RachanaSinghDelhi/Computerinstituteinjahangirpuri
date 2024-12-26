<!-- resources/views/pdf/certificates.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates</title>
</head>
<body>
    <h1>Selected Certificates</h1>

    @foreach ($certificates as $certificate)
        <div style="border: 1px solid #000; margin-bottom: 10px; padding: 10px;">
            <h2>{{ $certificate->name }}</h2>
            <p><strong>Student ID:</strong> {{ $certificate->student_id }}</p>
            <p><strong>Course:</strong> {{ $certificate->course->course_title ?? 'N/A' }}</p>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($certificate->date)->format('d M Y') }}</p>
            <p><strong>Grade:</strong> {{ $certificate->grade }}</p>
        </div>
    @endforeach
</body>
</html>
