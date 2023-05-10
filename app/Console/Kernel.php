<?php

namespace App\Console;

use App\Jobs\TestJob;
use App\Models\Infraccion;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function () {
        //     $infracion=Infraccion::find(4);
        //     $infracion->calcularEstado();
        // })->everyMinute();
        $schedule->job(new TestJob)->everyMinute();


    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
