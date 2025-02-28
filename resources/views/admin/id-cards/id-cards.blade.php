@extends('admin.layout.adminlte')
@section('title', 'Student ID Cards')
@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Student ID Cards</h2>
    
    <!-- Search Box -->
    <input type="text" id="searchBox" class="form-control mb-3" placeholder="Search for students...">

    <!-- Form for selecting and downloading ID cards -->
    <form action="{{ route('admin.students.downloadSelectedIdCards') }}" method="POST">
        @csrf
        <div class="row" id="studentList">
            @foreach($students as $student)
                <div class="col-md-6 mb-3 student-item">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selected_ids[]" value="{{ $student->student_id }}" id="student-{{ $student->student_id }}">
                        <label class="form-check-label" for="student-{{ $student->student_id }}">
                            <strong>{{ $student->name }}</strong> 
                            (ID: {{ $student->student_id }}, Course: {{ $student->course->course_title ?? 'N/A' }})
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Display error message if no IDs are selected -->
        @if($errors->has('selected_ids'))
            <div class="alert alert-danger">
                {{ $errors->first('selected_ids') }}
            </div>
        @endif

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary mt-3">Download Selected ID Cards</button>
    </form>

    <!-- Success/Error Messages -->
    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif

    <!-- Display all student ID cards -->
    <div class="row" id="studentCards">
        @foreach($students as $student)
            <div class="col-md-4 mb-4 student-item">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->name }}</h5>
                        <p class="card-text">Student ID: {{ $student->student_id }}</p>
                        <p class="card-text">Course: {{ $student->course->course_title ?? 'N/A' }}</p>

                        <!-- Display ID Card Template with student details -->
                        <div class="id-card">
                            <img src="{{ asset('assets/images/id_card.jpg') }}" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; object-fit: cover;">
                            <div class="image">
                                <img src="{{ asset('storage/students/' . $student->photo) }}" style="width: 60px; height: 70px;top: 50px; border-radius: 50%; border: 2px solid white;">
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

                        <!-- Download Button -->
                        <a href="{{ route('admin.students.downloadIdCard', $student->student_id) }}" 
                           class="btn btn-primary btn-sm mt-3">Download ID Card</a>

                     <!--   <a href="{{ route('admin.students.viewIdCard', $student->student_id) }}" class="btn btn-secondary btn-sm">View ID Card</a>-->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container">
    {{ $students->links() }}
</div>

<script>
    document.getElementById('searchBox').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let studentItems = document.querySelectorAll('.student-item');
        
        studentItems.forEach(function (item) {
            let text = item.textContent.toLowerCase();
            if (text.includes(filter)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endsection
@pushstyles
<style>
        @page {
            margin: 0;
        }
        body, html {
            margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 100%;
    box-sizing: border-box;
        }


        .container {
    width: 100%;
    padding: 0 15px; /* Ensures no overflow and consistent spacing */
    box-sizing: border-box;
}

        .id-card {
            width: 211.2px; /* ID card width in pixels (2.2 inches) */
            height: 336px; /* ID card height in pixels (3.5 inches) */
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
    @endpushstyles