@extends('dashboard.app')
@section('title', 'Add News')
@section('content')
<div class="container">
    <h1>News</h1>
    <form action="{{ route('dashboard.news.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add News</button>
    </form>

    <h2>Recent News</h2>
    <ul class="list-group">
        @foreach($newsItems as $news)
            <li class="list-group-item">
                <h5>{{ $news->title }}</h5>
                <p>{{ $news->content }}</p>
                <small>{{ $news->created_at->format('d M Y, h:i A') }}</small>
            </li>
        @endforeach
    </ul>
</div>
@endsection
