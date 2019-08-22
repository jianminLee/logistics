<?php


namespace Jianminlee\Logistics;;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/logistics.php' => config_path('logistics.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(Logistics::class, function () {
            return new Logistics();
        });
        $this->app->alias(Logistics::class, 'logistics');
    }

    public function provides()
    {
        return [Logistics::class, 'logistics'];
    }
}
