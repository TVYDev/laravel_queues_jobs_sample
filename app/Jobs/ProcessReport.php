<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sleepSeconds;
    protected $reportName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sleepSeconds, $reportName)
    {
        $this->sleepSeconds = $sleepSeconds;
        $this->reportName = $reportName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

    }
}
