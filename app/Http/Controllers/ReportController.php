<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generateReport (Request $request)
    {
        try
        {
            $report = (new Report())->generateSingleReport('Test2', 60);

            dd($report);
        }
        catch (\Exception $exception)
        {
            dd($exception->getMessage());
        }
    }
}
