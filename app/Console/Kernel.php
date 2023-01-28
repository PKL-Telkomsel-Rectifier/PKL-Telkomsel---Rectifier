<?php

namespace App\Console;

use App\Models\DataRectifier;
use App\Models\Rectifier;
use Illuminate\Auth\Recaller;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $rectifiers = Rectifier::get();

            foreach ($rectifiers as $rectifier) {
                # code...
                // DB::table('data_rectifiers')->insert([
                //     'rectifier_id' => $rectifier->id,
                //     'processor' => $rectifier::getProcess($rectifier),
                //     'memory' => $rectifier::getMemory($rectifier),
                // ]);

                DataRectifier::create([
                    'rectifier_id' => $rectifier->id,
                    'voltage' => $rectifier::getProcess($rectifier),
                    'current' => $rectifier::getCurrent($rectifier),
                    'temp' => $rectifier::getTemp($rectifier),
                ]);
            }
        })->everyMinute();
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
