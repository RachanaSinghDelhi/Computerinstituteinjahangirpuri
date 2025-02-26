@foreach ($certificates as $certificate)
<tr >
            <td>{{ $certificate->student_id }}</td>
            <td>{{ $certificate->name }}</td>
            <td>{{ $certificate->father }}</td>
            <td>{{ \Carbon\Carbon::parse($certificate->dt)->format('d-m-y')  }}</td> 
            <td>{{ \Carbon\Carbon::parse($certificate->date)->format('d-m-y') }}</td>
            <td>{{ $certificate->course }}</td>
            <td>
                <img src="{{ asset('storage/students/' . $certificate->photo) }}" width="50" alt="Photo">
            </td>
            <td>{{ $certificate->duration }}</td>
            <td>{{ $certificate->grade }}</td>
            <td>{{ $certificate->code }}</td>
        </tr>
        @endforeach