<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID Card</title>
    <style>
        /* Add some basic styles for PDF */
        .id-card {
            width: 300px;
            height: 450px;
            padding: 10px;
            background-color: #f9f9f9;
            position: relative;
            border: 1px solid #ddd;
        }

        .id-card img {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .id-card .content {
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            text-align: center;
        }

        .id-card .content h3 {
            margin: 0;
        }

        .id-card .content p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="id-card">
        <img src="{{ asset('assets/images/id_card.jpg') }}" alt="ID Card Template">
        
        <div class="content">
            <h3>{{ $student->name }}</h3>
            <p>ID: {{ $student->student_id }}</p>
            <p>Father: {{ $student->father_name ?? 'N/A' }}</p>
            <p>Course: {{ $student->course->course_title ?? 'N/A' }}</p>
            <p>Admission: {{ $student->doa ?? 'N/A' }}</p>
            <p>Contact: {{ $student->contact_number ?? 'N/A' }}</p>
        </div>
    </div>
</body>
</html>
