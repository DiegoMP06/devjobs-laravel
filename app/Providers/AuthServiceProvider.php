<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifiable, $url)
        {
            return (new MailMessage)
            ->subject('Verificar Cuenta de DevJobs')
            ->line('Tu Cuenta Casi Esta Lista, Solo debes Presionear El Enlace a Continuacion: ')
            ->action('Confirmar Cuenta', $url)
            ->line('Si No Creaste Esta Cuenta Puedes Ignorar El Email.');
        });

        
    }
}
