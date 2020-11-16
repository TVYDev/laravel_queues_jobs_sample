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
            $report = new Report();

            $arrDurations = [10, 30, 60];

            foreach ($arrDurations as $index => $d) {
                $name = "TEST_$index";

                /** Synchronous */
//                $report = $report->generateSingleReport($name, $d);


                /** Asynchronous */
                ProcessReport::dispatch($name, $d, $report)
                    ->onConnection('database');
            }



            dd($report);
        }
        catch (\Exception $exception)
        {
            dd($exception->getMessage());
        }
    }
}
