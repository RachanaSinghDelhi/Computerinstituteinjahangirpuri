@extends('teacher.layout.adminlte')

@section('title', 'Nottofications')
@section('content')
<div class="container">
    <h2>Notifications</h2>
    <div class="list-group">
        @forelse ($notifications as $notification)
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-bell text-info"></i> {{ $notification->data['message'] }}
                <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
            </a>
        @empty
            <p class="text-muted">No notifications available.</p>
        @endforelse
    </div>
    {{ $notifications->links() }}
</div>
@endsection
