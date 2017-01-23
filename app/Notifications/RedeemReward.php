<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RedeemReward extends Notification
{
    use Queueable;

    private $userReward;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userReward)
    {
        $this->userReward = $userReward;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
        $msg = $this->userReward->user_name." has requested to redeem the following reward: ".$this->userReward->reward_name;

        return [
            'title' => "Request to Redeem Reward",
            'user_id' => $this->userReward->user_id,
            'user_name' => $this->userReward->user_name,
            'reward_name' => $this->userReward->reward_name,
            'reward_description' => $this->userReward->reward_description,
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
