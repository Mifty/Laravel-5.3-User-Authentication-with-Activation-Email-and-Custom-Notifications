<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordResetConfirmationNotification extends Notification 
{
    /**
     * The password reset token.
     *
     * @var string
     */

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the notification message.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\MessageBuilder
     */
    public function toMail($notifiable)
    {
		return (new MailMessage)
                    ->subject($notifiable->username.', Your Password was Reset')
                    ->greeting('Hello, '.$notifiable->username)
                    ->line('You have successfully changed your '. config('app.name').' password.')

                    ->line('Thank you for using '. config('app.name'));
					
    }
}