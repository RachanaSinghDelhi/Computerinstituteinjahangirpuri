@foreach ($certificates as $certificate)
    <tr>
        <td>{{ $certificate->student_id }}</td>
        <td>{{ $certificate->name }}</td>
        <td>{{ $certificate->father }}</td>
        <td>{{ $certificate->dt }}</td>
        <td>{{ $certificate->date }}</td>
        <td>{{ $certificate->course }}</td>
        <td>
            <img src="{{ asset('storage/students/' . $certificate->photo) }}" alt="Photo" width="50">
        </td>
        <td>{{ $certificate->certificate_type }}</td>
        <td>{{ $certificate->duration }}</td>
        <td>{{ $certificate->description }}</td>
        <td>{{ $certificate->grade }}</td>
        <td>{{ $certificate->code }}</td>
    </tr>
@endforeach
