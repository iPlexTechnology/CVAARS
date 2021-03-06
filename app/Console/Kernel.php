<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:SendFirstVaccinationDate')->dailyAt("00:30");
        $schedule->command('command:SendSecondVaccinationDate')->dailyAt("00:30");
        $schedule->command('command:VaccineDateRemind')->dailyAt("00:30");

        // $schedule->command('command:SendFirstVaccinationDate');
        // $schedule->command('command:SendSecondVaccinationDate');
        // $schedule->command('command:VaccineDateRemind');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
