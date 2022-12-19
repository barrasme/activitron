<?php
namespace Barras\Activitron;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\AboutCommand;

class ActivitronServiceProvider extends ServiceProvider
{
    private string $version = '0.0.1';

    /**
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__ . '/../config/activitron.php' => config_path('activitron.php'),
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ]);

        AboutCommand::add('Activitron, get information about all model events for the user', fn () => ['Version' => $this->version]);
    }
}
