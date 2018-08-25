<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Reparacion;

class ReparacionFueCreada extends Notification
{
    use Queueable;
    public $reparacion;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reparacion $reparacion)
    {
        $this->reparacion = $reparacion;
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
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $r = $this->reparacion;
        return [
            'usuario'  => $r->user->name,
            'cliente'  => $r->cliente->nombre,
            'articulo' => $r->articulo->nombre,
            'mensaje'  => 'El usuario "'.$r->user->name.'" creo una reparacion en el articulo "'.$r->articulo->name.'"',
            'mensaje-corto' => 'Nueva reparacion creada',
            'icono'    => 'fa-wrench',
            'text-color'    => 'text-green',
            'link'     => route('reparaciones.revision', $r->id)
        ];
    }
}
