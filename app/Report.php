<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = ['name', 'duration_seconds'];

    public function generateSingleReport ($name, $seconds)
    {
        sleep($seconds);

        $report = self::create([
            'name' => $name,
            'duration_seconds' => $seconds
        ]);

        return $report;
    }
}
