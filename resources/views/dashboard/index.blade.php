@extends('dashboard.app')
@section('title', 'Courses')
@section('content')
<div class="container">
    <div id="addCourse"></div>
    <div id="EditCourse"></div>
    <h1 class="display-1">Courses list</h1>
    <br>

    <div id="alert-box">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
     <div>
        <a href="/dashboard/course" >  
                        <button class="btn btn-sm btn-success">Add</button>
                    </a>
                   
</div>
<br/>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr id="course-row-{{ $course->id }}">
                <td><img src="{{ asset('storage/'.$course->course_image) }}" alt="{{ $course->course_title }}" style="max-width: 100px; height:100px;"></td>
                <td>{{ $course->course_title }}</td>
                <td >{{ \Illuminate\Support\Str::limit($course->course_desc, 150, '...') }}</td>
                <td >{{ \Illuminate\Support\Str::limit($course->course_content, 150, '...') }}</td>

                <td>
                    
                   <p> <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a></p>
                
                   <p><a href="javascript:void(0);" class="btn btn-sm btn-danger delete-course" data-id="{{ $course->id }}">Delete</a><p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection


