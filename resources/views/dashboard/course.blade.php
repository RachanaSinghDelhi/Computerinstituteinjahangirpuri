<!-- dashboard/course.blade.php -->
@extends('dashboard.app')
@section('title', 'Courses')
@section('content')
<div class="container body_cont">
    <div class="row justify-content-center">
                <br>

        <div class="col-md-6">
        
<br>
        
            <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="course_title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="course_title" name="course_title">
                    @error('course_title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_desc" class="form-label">Description:</label>
                    <textarea class="form-control" id="course_desc" name="course_desc"></textarea>
                    @error('course_desc')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_content" class="form-label">Content:</label>
                    <textarea class="form-control  " id="course_content" name="course_content" rows="100"></textarea>
                   
                    @error('course_content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_image" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="course_image" name="course_image">
                    @error('course_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

             <p>   <label for="course_url">Course URL (optional)</label>
    <input type="text" name="course_url" id="course_url"></p>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
<br>
        
        </div>
    </div>
</div>



@endsection

