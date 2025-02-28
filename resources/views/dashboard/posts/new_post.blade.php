@extends('dashboard.layout.adminlte')

@section('title', 'Post List')

@section('content')
<div class="container-fluid mt-4">
<div class="mb-3">
        <a href="{{ route('posts.create_post') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add New Post
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Post List</h3>
        </div>

        
        <div class="card-body">
            
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
                                <td class="d-none d-sm-table-cell">{{ Str::limit($post->content, 50) }}</td>
                                <td class="d-none d-sm-table-cell">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('posts.edit_edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                    </form>
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
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#postsTable').DataTable({
                responsive: true,
                autoWidth: false,
                paging: true,
                searching: true,
                lengthChange: true,
                pageLength: 10,
                lengthMenu: [5, 10, 15, 20],
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
