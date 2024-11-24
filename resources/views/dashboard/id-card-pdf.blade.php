<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .id-card {
            width: 300px;
            height: 150px;
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            border-radius: 8px;
        }
        .id-card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .student-info {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="id-card">
        <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo">
        <div class="student-info">
            <h3>{{ $student->name }}</h3>
            <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
            <p><strong>Course:</strong> {{ $student->course->name }}</p>
            <p><strong>Batch:</strong> {{ $student->batch }}</p>
        </div>
    </div>

</body>
</html>
