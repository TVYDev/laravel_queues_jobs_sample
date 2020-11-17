<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessReport;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generateReport (Request $request)
    {
        try
        {
//            ini_set('max_execution_time', -1);

            $report = new Report();

            $arrDurations = [1, 10, 30, 45, 10, 50, 5, 20, 60];

            foreach ($arrDurations as $index => $d) {
                /** Synchronous */
//                $report = $report->generateSingleReport("SYNC_TEST_$index", $d);


                /** Asynchronous */
                ProcessReport::dispatch("ASYNC_TEST_$index", $d, $report)
                    ->onConnection('database');
//                    ->onQueue("Report$d");
            }



            dd($report);
        }
        catch (\Exception $exception)
        {
            dd($exception->getMessage());
        }
    }
}
