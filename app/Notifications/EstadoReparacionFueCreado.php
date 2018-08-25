<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\EstadoReparacion;

class EstadoReparacionFueCreado extends Notification
{
    use Queueable;
    public $estado;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(EstadoReparacion $estado)
    {
        $this->estado = $estado;
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
        $mensaje;
        $e = $this->estado;
        if($e->estado->estado == 'ENTREGADO')
        {
            $mensaje = 'El usuario '.$e->user->name.' entrego el articulo "'.$e->reparacion->articulo->nombre.'" en la reparacion '.$e->reparacion_id;
        }
        else
        {
            $mensaje = 'El usuario '.$e->user->name. ' paso al estado "'.$e->estado->estado.'" en la reparacion '.$e->reparacion_id; 
        }
        return [
            'usuario'       => $e->user->name,
            'mensaje'       => $mensaje,
            'mensaje_corto' => 'Nuevo Estado en reparacion',
            'icono'         => 'fa-sitemap',
            'text_color'    => 'text-aqua',
            'link'          => route('reparaciones.revision', $e->reparacion_id)
        ];
    }
}
