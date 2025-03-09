@extends('teacher.layout.adminlte')

@section('title', 'Edit Assignment')

@section('content')
<div class="container">
    <h2>Edit Assignment</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('teacher.assignments.update', $assignment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Assignment Title</label>
            <input type="text" name="title" class="form-control" value="{{ $assignment->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Assignment Description</label>
            <textarea name="description" class="form-control" required>{{ $assignment->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $assignment->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Deadline</label>
            <input type="date" name="due_date" class="form-control" value="{{ $assignment->due_date }}" required>
        </div>

        <div class="form-group">
            <label for="file">Upload New File (Optional)</label>
            <input type="file" name="file" class="form-control">
            @if($assignment->file)
                <p>Current File: <a href="{{ asset('storage/' . $assignment->file) }}" target="_blank">View File</a></p>
            @endif
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $assignment->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $assignment->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Assignment</button>
    </form>
</div>
@endsection
