{{-- dashboard/fees/search_fees_table.blade.php --}}
@foreach($feesData as $fee)
    <tr>
        <td>{{ $fee->student_id }}</td>
        <td>{{ $fee->student_name }}</td>
        <td>{{ $fee->course_title }}</td>
        <td class="d-none d-md-table-cell">{{ $fee->total_fees }}</td>
        <td class="d-none d-md-table-cell">{{ $fee->installments }}</td>
        <td class="d-none d-md-table-cell">{{ $fee->fees_paid }}</td>
        <td class="d-none d-md-table-cell">{{ $fee->fees_due }}</td>
        <td>
            <span class="badge 
                @if($fee->status == 'Paid') 
                    bg-success 
                @elseif($fee->status == 'Paid but Pending Next Month') 
                    bg-warning 
                @else 
                    bg-danger 
                @endif
            ">
                {{ $fee->status }}
            </span>
        </td>
        <td>
            <a href="{{ route('add_fees', $fee->student_id) }}" class="btn btn-primary">Pay Now</a>
            <a href="{{ route('fees.show', $fee->student_id) }}" class="btn btn-info">View Details</a>
        </td>
    </tr>
@endforeach
