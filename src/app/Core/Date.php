<?php


namespace OnDezk\Estimate\App\Core;


class Date
{

    public $year;
    public $month;
    public $day;

    public function __construct($year, $month)
    {
        $this->year  = $year;
        $this->month = $month;
    }

}
