<?php

namespace  Bravist\Invitation;

use Illuminate\Support\ServiceProvider;

class InvitationProvider extends ServiceProvider
{
    /**
     * 延迟加载
     *
     * @var boolean
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
        $this->setupMigrations();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/config/invitation.php');
        $this->publishes([$path => config_path('invitation.php')], 'config');
        $this->mergeConfigFrom($path, 'invitation');

        // if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
        //     $this->publishes([
        //         $source => config_path('invitation.php')
        //     ]);
        // } elseif ($this->app instanceof LumenApplication) {
        //     $this->app->configure('invitation');
        // }
        // $this->mergeConfigFrom($source, 'invitation');
    }


    protected function setupMigrations()
    {
        $source = realpath(__DIR__ . "/migrations");

        $this->publishes([$source => database_path('migrations')], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(['Bravist\\Invitation' => 'invitation'], function($app){
            return new Invitation(config('letter'));
        });
    }


    /**
     * 提供的服务
     *
     * @return array
     */
    public function provides()
    {
        return ['invitation', 'WeiPei\\Invitation'];
    }
}
