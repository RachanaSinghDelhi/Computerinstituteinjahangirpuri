<?php
namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a list of notifications.
     */
    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(10);
        return view('teacher.notifications.index', compact('notifications'));
    }

    /**
     * Fetch unread notifications for the navbar dropdown.
     */public function getNotifications()
{
    $user = Auth::user();
    
    // Fetch unread notifications
    $unreadNotifications = $user->unreadNotifications()->take(5)->get();

    // Format notifications properly
    $notificationsData = $unreadNotifications->map(function ($notification) {
        return [
            'id' => $notification->id,
            'message' => $notification->data['message'] ?? 'No message', // Ensure message is not missing
            'created_at' => $notification->created_at->diffForHumans() // Convert timestamp to "5 mins ago" format
        ];
    });

    return response()->json([
        'count' => $unreadNotifications->count(),
        'notifications' => $notificationsData
    ]);
}


    /**
     * Mark notifications as read when the user clicks the dropdown.
     */
    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return response()->json(['message' => 'Notifications marked as read']);
    }
}
