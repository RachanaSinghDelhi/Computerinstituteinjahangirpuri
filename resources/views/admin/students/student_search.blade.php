@foreach($students as $student)
    <tr>
        <td>
            <input type="checkbox" name="student_ids[]" value="{{ $student->student_id }}" class="student-checkbox">
        </td>
        <td>{{ $student->id }}</td>
        <td>{{ $student->student_id }}</td>
        <td>{{ $student->name }}</td>
        <td class="d-none d-md-table-cell">{{ $student->father_name }}</td>
        <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($student->doa)->format('d-m-Y') }}</td>
        <td>{{ $student->course->course_title ?? 'N/A' }}</td>
        <td class="d-none d-md-table-cell">{{ $student->batch }}</td>
        <td>
            @if($student->photo)
                <img src="{{ asset('storage/students/' . $student->photo) }}" alt="Student Photo" width="50">
            @else
                No Photo
            @endif
        </td>
        <td>
            <select name="status" class="form-control form-control-sm student-status" data-student-id="{{ $student->student_id }}">
                <option value="Active" {{ strtoupper(trim($student->status)) === 'ACTIVE' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ strtoupper(trim($student->status)) === 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
                <option value="Left" {{ strtoupper(trim($student->status)) === 'LEFT' ? 'selected' : '' }}>Left</option>
                <option value="Completed" {{ strtoupper(trim($student->status)) === 'COMPLETED' ? 'selected' : '' }}>Completed</option>
            </select>
            <a href="{{ route('students.edit', $student->student_id) }}" class="btn btn-primary btn-sm">Edit</a>
         
        </td>
    </tr>
@endforeach