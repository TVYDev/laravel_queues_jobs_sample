<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = ['name', 'duration_seconds'];

    public function generateSingleReport ($name, $seconds)
    {
        $seconds = 0;
        sleep($seconds);

        $this->writeFile($name);

        $report = self::create([
            'name' => $name,
            'duration_seconds' => $seconds
        ]);

        return $report;
    }

    private function writeFile ($fileName) {
        $fpCSV = fopen("/srv/web_storage/$fileName.csv", 'w');
        for($row=0; $row<100000; $row++) {
            $rowContent = [];
            for ($col = 0; $col < 100; $col++) {
                array_push($rowContent, 'lorem ipsum');
            }
            fputcsv($fpCSV, $rowContent);
        }
        fclose($fpCSV);
    }
}
