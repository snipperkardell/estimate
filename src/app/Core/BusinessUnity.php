<?php


namespace OnDezk\Estimate\App\Core;


class BusinessUnity
{
    public $code;
    public $desc;

    public function __construct($code, $desc)
    {
        $this->code = $code;
        $this->desc = $desc;
    }
}
