<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestNotification extends Notification
{
    use Queueable;

    protected $secret;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(String $secret)
    {
        $this->secret = $secret;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->greeting('¡Hola!')
            ->line('¡Gracias por registrarte en Social Hub!')
            ->line("Tu código secreto de Google 2FA es: " . $this->secret)
            ->line('Por favor, guárdalo en un lugar seguro y no lo compartas con nadie.')
            ->line('Estamos emocionados de tenerte con nosotros y esperamos que disfrutes de todas las funcionalidades que ofrecemos.')
            ->salutation('Saludos cordiales, El equipo de Social Hub');
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
