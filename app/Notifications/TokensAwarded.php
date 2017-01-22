<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TokensAwarded extends Notification
{
    use Queueable;
    private $tokenData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tokenData)
    {
        $this->tokenData = $tokenData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['Database'];
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
        $msg = $this->tokenData->user_name." has been awarded ".$this->tokenData->token_amount.
            " tokens for successfully completing the chore: \"".$this->tokenData->chore_name."\"";
        return [
            'title' => "Tokens Awarded",
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
