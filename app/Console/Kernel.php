<?php

namespace App\Console;

use App\Console\Commands\CheckDueAds;
use App\Console\Commands\CheckSubsEndTime;
use App\Console\Commands\CheckSubsWithCurrentTime;
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
        CheckDueAds::class,
        CheckSubsWithCurrentTime::class,
        CheckSubsEndTime::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:checkdueads')
            ->everyMinute();

        $schedule->command('command:checkSubsWithCurrentTime')
            ->everyMinute();

        $schedule->command('command:checkSubEndTime')
            ->everyMinute();
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
