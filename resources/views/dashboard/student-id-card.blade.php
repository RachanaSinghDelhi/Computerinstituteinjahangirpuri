<!DOCTYPE html>
<html>
<head>
    <title>{{ $student->name }}'s ID Card</title>
    <style>
        @page {
            margin: 0;
        }
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start; /* Align the cards from the left */
            width: 100%; /* Full width of the page */
            height: 100%;
            box-sizing: border-box; /* Avoid any unwanted space due to padding/margin */
            border: 2px solid #ddd;
           
        }

        .id-card {
            width: 209px; /* ID card width in pixels (2.2 inches) */
            height: 332px; /* ID card height in pixels (3.5 inches) */
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            position: relative;
            border: 1px solid #ddd;
            page-break-inside: avoid;
            box-sizing: border-box;
        }

        .image {
            position: absolute;
            top: 40px; /* Space from top for photo */
            left: 50%;
            transform: translateX(-50%);
        }

        .ele {
            margin-bottom: 7px;
            font-size: 10px; /* Font size for elements */
            color:#000000
            text-transform: uppercase;
            font-weight: bold;
            left:10%;
        }

        .text-container {
            position: absolute;
            top: 120px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: #ffffff;
        }

        .text-container div {
          
            font-size: 12px;
            font-weight: bold;
        }
    </style>
   
</head>
<body>
<div class="id-card">
                          <div class="id-card">
            <img src="{{ public_path('assets/images/id_card.jpg') }}" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; object-fit: cover;">
            <div class="image">
                <img src="{{ public_path('storage/students/' . $student->photo) }}" style="width: 60px; height: 70px; border-radius: 50%; border: 2px solid white;">
            </div>
            <div class="text-container">
                <div>{{ $student->name }}</div>
                <div>{{ $student->course->course_title ?? 'N/A' }}</div>
            </div>
            <div style="position: absolute; top: 180px; left:30px; font-size: 10px; color: black;">
                <p class="ele"><b>ID:</b> {{ $student->student_id }}</p>
                <p class="ele"><b>Father:</b> {{ $student->father_name ?? 'N/A' }} </p>
                <p class="ele"><b>Admission dt:</b> {{ $student->doa ?? 'N/A' }}</p>
                <p class="ele"><b>Contact:</b> {{ $student->contact_number ?? 'N/A' }}</p>
            </div>
        </div>
</body>
</html>
