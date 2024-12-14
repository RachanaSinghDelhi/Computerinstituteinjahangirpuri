@extends('dashboard.app')
@section('title', 'Add Fees')
@section('content')
<h1>Add Fee</h1>

<form action="{{ route('fees.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="student_id">Student:</label>
    <select name="student_id" id="student_id" required>
        @foreach ($students as $student)
        <option value="{{ $student->id }}">{{ $student->student_id }}</option>
        @endforeach
    </select>
  
    <label for="amount">Amount:</label>
    <input type="number" name="amount" id="amount" step="0.01" required>

    <label for="payment_date">Payment Date:</label>
    <input type="date" name="payment_date" id="payment_date" required>

    <label for="receipt_image">Receipt Image:</label>
    <input type="file" name="receipt_image" id="receipt_image" accept="image/*">

    <button type="submit">Submit</button>
</form>
@endsection