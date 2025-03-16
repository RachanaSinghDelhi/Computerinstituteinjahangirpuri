<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class BatchChangeApproved extends Notification
{
    use Queueable;

    public $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function via($notifiable)
    {
        return ['database']; // Stores in the database
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Batch time updated for student: " . $this->student->name,
            'url' => route('teacher.notifications.index'),
        ];
    }
}
