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
        // $schedule->command('inspire')
        //          ->hourly();//daily
        //$schedule->exec("touch foo.txt")->everyFiveMinutes();//dailyAt('17:31');//everyTenMinutes();
        //$schedule->command("ls")->everyFiveMinutes()->sendOutputTo('/test/test.txt')->emailOutputTo('victor_traian@yahoo.com');//->dailyAt('18:30')
        //$schedule->command('laracasts:clear-history')->monthly();//->thenPing('url')
        //$schedule->command('laracasts:daily-report')->dailyAt('23:55');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
