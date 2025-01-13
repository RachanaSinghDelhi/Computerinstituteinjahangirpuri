<table id="coursesTable" class="table table-bordered">
            
            <tbody id="coursesBody">
                @foreach ($courselist as $course)
                <tr id="course-row-{{ $course->id }}">
                    <td>
                        <img src="{{ asset('storage/courses/'.$course->course_image) }}" alt="{{ $course->course_title }}" style="max-width: 100px; height:100px;">
                    </td>
                    <td>{{ $course->course_title }}</td>
                    <td class="d-none d-sm-table-cell">{{ $course->course_url }}</td>
                    <td class="d-none d-sm-table-cell">{{ \Illuminate\Support\Str::limit($course->course_desc, 50, '...') }}</td>
                    <td class="d-none d-sm-table-cell">{{ \Illuminate\Support\Str::limit($course->course_content, 50, '...') }}</td>
                    <td class="d-none d-sm-table-cell">{{ $course->duration }}</td>
                    <td class="d-none d-sm-table-cell">{{ $course->total_fees }}</td>
                    <td class="d-none d-sm-table-cell">{{ $course->installments }}</td>
                    <td>
                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>