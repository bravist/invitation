<?php

namespace  Bravist\Invitation;

use Illuminate\Support\ServiceProvider;

class InvitationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $path = realpath(__DIR__ . '/config/invitation.php');
        $this->publishes([$path => config_path('invitation.php')], 'config');
        $this->mergeConfigFrom($path, 'invitation');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(['Bravist\\Invitation' => 'invitation'], function($app){
            return new Invitation($app->make(config('invitation.letter')));
        });
    }
}
