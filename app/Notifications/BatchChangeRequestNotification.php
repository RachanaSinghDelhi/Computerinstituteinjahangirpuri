<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class BatchChangeRequestNotification extends Notification implements ShouldQueue
{
    use Queueable;
    
    protected $student;
    protected $newBatch;

    public function __construct($student, $newBatch)
    {
        $this->student = $student;
        $this->newBatch = $newBatch;
    }

    public function via($notifiable)
    {
        return ['database', 'mail']; // Store in database + Send Email
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Batch change request from {$this->student->name} to {$this->newBatch}.",
            'student_id' => $this->student->id,
            'new_batch' => $this->newBatch,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Batch Change Request')
            ->line("Student {$this->student->name} has requested a batch change.")
            ->line("Requested Batch: {$this->newBatch}")
            ->action('Approve/Reject', url('/dashboard/super_admin/student-approvals'));
    }
}
