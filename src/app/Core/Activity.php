<?php


namespace OnDezk\Estimate\App\Core;


class Activity
{
    private $code;
    private $desc;
    private $task;

    public function __construct($code, $desc, $task)
    {
        $this->code = $code;
        $this->desc = $desc;
        $this->task = $task;
    }
}
