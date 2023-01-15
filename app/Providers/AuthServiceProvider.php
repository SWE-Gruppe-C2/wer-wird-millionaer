<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(Lang::get('Verfikation ihrer E-Mail Adresse'))
                ->line(Lang::get('Bitte drücken Sie die unten zusehende Schaltfläche, um ihre E-Mail zu verifizieren.'))
                ->action(Lang::get('E-Mail verifizieren'), $url)
                ->line(Lang::get('Ignorieren sie diese E-Mail, wenn sie keinen Account bei uns Registriert haben'));
        });

    }
}
