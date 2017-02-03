<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ChoreUpdated extends Notification
{
    use Queueable;
    private $updatedChore;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($chore)
    {
        $this->updatedChore = $chore;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
        return['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        $msg = $this->updatedChore->user_name." has marked the chore \"".$this->updatedChore->name.
            "\" as done.";
        return [
            'title' => "Chore Updated",
            'user_id' => $this->updatedChore->user_id,
            'user_name' => $this->updatedChore->user_name,
            'chore_id' => $this->updatedChore->id,
            'chore_name' => $this->updatedChore->name,
            'chore_status' => $this->updatedChore->status,
            'msg' => $msg
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
