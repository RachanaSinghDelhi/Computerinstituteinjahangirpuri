@extends('adminlte::page')

@section('title', 'Receipts')
@section('content')

    <div class="container mt-5">
        <h1 class="text-center">Upload Receipts</h1>
        <form action="{{ route('receipts.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input for starting number -->
            <div class="mb-3">
                <label for="starting_number" class="form-label">Starting Number:</label>
                <input type="number" name="starting_number" id="starting_number" class="form-control" required>
            </div>

            <!-- File input -->
            <div class="mb-3">
                <label for="receipts" class="form-label">Select Receipts:</label>
                <input type="file" name="receipts[]" id="receipts" class="form-control" multiple required>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <!-- Display Uploaded Receipts -->
        <h2 class="mt-5">Uploaded Receipts</h2>
        <div class="row">
            @forelse($receipts as $receipt)
                <div class="col-md-3 mb-4 text-center">
                    <div class="card">
                        <img src="{{ asset('storage/' . $receipt->file_path) }}" class="card-img-top" alt="{{ $receipt->file_name }}">
                        <div class="card-body">
                            <p class="card-text" style="font-size: 20px;">{{ $receipt->file_name }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No receipts found.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $receipts->links() }} <!-- This will generate the pagination links -->
        </div>
    </div>

     @endsection
