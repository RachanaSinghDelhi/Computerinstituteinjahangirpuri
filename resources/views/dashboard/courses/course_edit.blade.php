@extends('dashboard.layout.adminlte')

@section('title', 'Edit Course')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Edit Course</h3>
        </div>
        <div class="card-body">
            <!-- Form for updating course using PUT method -->
            <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Course Image Field -->
                <x-adminlte-input-file name="course_image" label="Course Image" placeholder="Choose an image..." />
                @if ($course->course_image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/courses/' . $course->course_image) }}" alt="Course Image" width="100">
                    </div>
                @endif
                @error('course_image')
                    <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
                @enderror

                <!-- Course Title & Course Name Fields in Row -->
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input name="course_title" label="Course Title" value="{{ old('course_title', $course->course_title) }}" />
                        @error('course_title')
                            <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input name="course_name" label="Course Name" value="{{ old('course_name', $course->course_name) }}" />
                        @error('course_name')
                            <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
                        @enderror
                    </div>
                </div>

                <!-- Course Description Field -->
                <x-adminlte-textarea name="course_desc" label="Course Description">
                    {{ old('course_desc', $course->course_desc) }}
                </x-adminlte-textarea>
                @error('course_desc')
                    <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
                @enderror

                <!-- Course Content Field with Quill Editor -->
                <div class="form-group">
                    <label for="course_content">Course Content</label>
                    <div id="quill_editor">{!! old('course_content', $course->course_content) !!}</div>
                    <input type="hidden" name="course_content" id="course_content" value="{{ old('course_content', $course->course_content) }}">
                    @error('course_content')
                        <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
                    @enderror
                </div>

                <!-- Duration, Total Fees & Installments in Row -->
                <div class="row">
                    <div class="col-md-4">
                        <x-adminlte-input type="number" name="duration" label="Duration (in months)" value="{{ old('duration', $course->duration) }}" min="1" />
                        @error('duration')
                            <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <x-adminlte-input type="number" name="total_fees" label="Total Fees" value="{{ old('total_fees', $course->total_fees) }}" min="0" />
                        @error('total_fees')
                            <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <x-adminlte-input type="number" name="installments" label="Installments" value="{{ old('installments', $course->installments) }}" min="1" />
                        @error('installments')
                            <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
                        @enderror
                    </div>
                </div>

                <!-- Course URL Field -->
                <x-adminlte-input name="course_url" label="Course URL (optional)" value="{{ old('course_url', $course->course_url) }}" />

                <!-- Submit Button -->
                <x-adminlte-button type="submit" theme="success" label="Update Course" class="mt-3" />
            </form>
        </div>
    </div>
</div>
@endsection
@push('css')
    {{-- Quill Editor Styles --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('js')
    {{-- Quill Editor --}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>
    <script>
        var quill = new Quill('#quill_editor', {
            theme: 'snow',
            placeholder: 'Edit course content...',
            modules: {
                toolbar: [
                    [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'image', 'video'],
                    [{ 'align': [] }]
                ]
            }
        });
        
        quill.on('text-change', function() {
            document.querySelector('#course_content').value = quill.root.innerHTML;
        });
        
        document.querySelector('form').onsubmit = function() {
            document.querySelector('#course_content').value = quill.root.innerHTML;
        };
    </script>
@endpush
