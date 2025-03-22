@extends('teacher.layout.adminlte')

@section('title', 'Assignment Submissions')

@section('content')
<div class="container">
    <h2>Submissions for: {{ $assignment->title }}</h2>
 @if ($assignment->students->isEmpty())
        <p>No submissions yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Submitted Answers</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignment->students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            @php
                                $answers = $student->pivot->answers ?? null;
                            @endphp

                            @if (!empty($answers))
                                @php
                                    $decodedAnswers = json_decode($answers, true);
                                @endphp

                                @if (is_array($decodedAnswers) && count($decodedAnswers) > 0)
                                    <ul>
                                        @foreach ($decodedAnswers as $answer)
                                            <li>{{ $answer }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">No answers submitted</span>
                                @endif
                            @else
                                <span class="text-muted">No answers submitted</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
