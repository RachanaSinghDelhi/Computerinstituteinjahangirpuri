<!DOCTYPE html>
<html>
<head>
    <title>{{ $student->name }}'s ID Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
          
            margin: 0;
            padding: 0;
        }
        .id-card {
            border: 1px solid #ddd;
            width: 300px;
            height: 500px;
            margin:40px 20px;
            padding: 20px;
            background: #f5f5f5;
            
            position: relative;

        }
      

        .image {position: absolute; margin-top: 50px; left: 50%; transform: translateX(-50%);}

        
        .details p {
            margin: 5px 0;
            color: black;
        }
        .ele {
            margin-bottom: 20px;
            font-size: 14px;
            color:black;
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="id-card">
                            <!-- ID Card Background Template -->
                            <img src="{{ public_path('assets/images/id_card.jpg') }}" alt="ID Card Template" 
                                 style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; object-fit: cover;">
                            
                            <!-- Overlay Student's Photo -->
                            @if($student->photo)
                                <div class="image">
                                    <img class="photo" src="{{ public_path('storage/' . $student->photo) }}" style=" width: 90px; height: 95px;border-radius: 50%;border:5px solid white;" alt="Student Photo"/>
                                </div>
                            @endif

                            <!-- Overlay Student Details -->
                            <div style="position: absolute; top: 190px; left: 50%; transform: translateX(-50%); text-align: center; color: white;">
                                <div style="font-size: 16px; font-weight: bold;">{{ $student->name }}</div>
                                <div style="font-size: 14px;">{{ $student->course->course_title ?? 'N/A' }}</div>
                            </div>

                            <!-- Additional Info -->
                            <div style="position: absolute; top: 250px; left: 50px; font-size: 14px;color: black; padding:10px;">
                                <div class="ele" style="color:black"><b>ID:</b> {{ $student->student_id }}</div>
                                <div class="ele" style="color:black"><b>Father:</b> {{ $student->father_name ?? 'N/A' }}</div>
                                <div class="ele" style="color:black"><b>Admission dt:</b> {{ $student->doa ?? 'N/A' }}</div>
                                <div class="ele"  style="color:black"><b>Contact:</b> {{ $student->contact_number ?? 'N/A' }}</div>
                            </div>
                        </div>
</body>
</html>
