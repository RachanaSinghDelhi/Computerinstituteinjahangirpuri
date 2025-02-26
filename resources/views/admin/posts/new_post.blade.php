@extends('adminlte::page')

@section('content')

<div class="container container-fluid mt-4">
    <h2>Post List</h2>

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Responsive Table -->
    <div class="table-responsive">
        <table id="postsTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th class="d-none d-sm-table-cell">Content</th>
                    <th class="d-none d-sm-table-cell">Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td class="d-none d-sm-table-cell">{{ Str::limit($post->content, 50) }}</td> <!-- Limiting the content length for display -->
                        <td class="d-none d-sm-table-cell">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <!-- Edit and Delete Actions -->
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                           
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No posts available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')

<!-- Initialize DataTables -->
<script>
$(document).ready(function () {
    $('#postsTable').DataTable({
        paging: true,
            searching: true,
            lengthChange: true, // Enable the "Show entries" dropdown
            pageLength: 10, // Default number of rows
            lengthMenu: [5, 10, 15, 20], // Dropdown options
            responsive: true,
            autoWidth: false,
            language: {
                searchPlaceholder: "Search records...",
                lengthMenu: "Show _MENU_ entries",
                paginate: {
                    next: "Next",
                    previous: "Previous"
                }
            }
    });
});
</script>
@endpush
