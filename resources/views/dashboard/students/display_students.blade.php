@extends('dashboard.app')
@section('title', 'Students List')
@section('content')
<div class="container container-fluid mt-4">
    <h2 class="mb-4">Student List</h2>

    <!-- Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif



    <h2>Import Students via Excel</h2>
        <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Upload Excel File</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-2">Import</button>
        </form>
    </div>

    <!-- Table for displaying students -->
    <form action="{{ route('students.deleteMultiple') }}" method="POST">
    @csrf
    @method('DELETE')

    <!-- Master checkbox -->
    <div class="mb-2">
        <input type="checkbox" id="selectAll" onclick="toggleSelectAll()">
        <label for="selectAll">Select All</label>
        <button type="submit" class="btn btn-danger btn-sm ms-2">Delete Selected</button>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Select</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>Date of Admission</th>
                <th>Course</th>
                <th>Batch</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>
                    <input type="checkbox" name="student_ids[]" value="{{ $student->id }}" class="student-checkbox">
                </td>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->father_name }}</td>
                <td>{{ \Carbon\Carbon::parse($student->doa)->format('d-m-Y') }}</td>
                <td>{{ $student->course->course_title ?? 'N/A' }}</td>
                <td>{{ $student->batch }}</td>
                <td>
                    @if($student->photo)
                        <img src="{{ asset('storage/students/' . $student->photo) }}" alt="Student Photo" width="50">
                    @else
                        No Photo
                    @endif
                </td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $students->links() }}
</form>

@endsection

@push('scripts')
 <!-- Custom JavaScript for master checkbox functionality -->

<script>
    function toggleSelectAll() {
        const masterCheckbox = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.student-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = masterCheckbox.checked);
    }
</script>
 
@endpush

