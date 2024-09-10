<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    public $vacante_id;
    public $vacante_nombre;
    public $usuario_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($vacante_id, $vacante_nombre, $usuario_id)
    {
        $this->vacante_id = $vacante_id;
        $this->vacante_nombre = $vacante_nombre;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url(route('notificaciones'));
        return (new MailMessage)
                    ->subject('Nuevo Candidato')
                    ->greeting('Hola, ' . $notifiable->name)
                    ->line('Has Recibido un Nuevo Candidato Para Tu Vacante: ' . $this->vacante_nombre .'.')
                    ->line('Revisalo Cuando Puedas.')
                    ->action('Ver Notificaciones', $url)
                    ->line('¡Gracias Por Utilizar DevJobs!');
    }

    // Alamacena La Notificacion en la DB
    public function toDatabase($notifiable)
    {
        return [
            'vacante_id' => $this->vacante_id,
            'vacante_nombre' => $this->vacante_nombre,
            'usuario_id' => $this->usuario_id,
        ];
    }
}
