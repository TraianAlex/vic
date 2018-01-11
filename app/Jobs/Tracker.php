<?php

namespace App\Jobs;

use App\Stat;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Tracker implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     * '/^162.158.126.(66|84)$/'
     * @return void
     */
    public function handle()
    {
        // $ip = isset($_SERVER['REMOTE_ADDR']) ?: '1.1.1.1';
        // if (!preg_match('/^127.0.0.(1|2)$/', $ip)) {
        //     $stat = new Stat;
        //     $stat->page = isset($_SERVER['REQUEST_URI']) ?: '/no-page';
        //     $stat->ip = $ip;
        //     $stat->save();
        // }
        if (!preg_match('/^127.0.0.(1|2)$/', $_SERVER['REMOTE_ADDR'])) {
            $stat = new Stat;
            $stat->page = $_SERVER['REQUEST_URI'];
            $stat->ip = $_SERVER['REMOTE_ADDR'];
            $stat->save();
        }
    }
}
/*
        if (!preg_match('/^162.158.126.(66|84)$/', $_SERVER['REMOTE_ADDR'])) {
            $stat = new Stat;
            $stat->page = $_SERVER['REQUEST_URI'];
            $stat->ip = $_SERVER['REMOTE_ADDR'];
            $stat->save();
        }
*/
