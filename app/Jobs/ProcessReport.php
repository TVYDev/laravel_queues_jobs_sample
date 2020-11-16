<?php

namespace App\Jobs;

use App\Report;
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
    protected $report;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sleepSeconds, $reportName, Report $report)
    {
        $this->sleepSeconds = $sleepSeconds;
        $this->reportName = $reportName;
        $this->report = $report;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->report->generateSingleReport($this->reportName, $this->sleepSeconds);
    }
}
