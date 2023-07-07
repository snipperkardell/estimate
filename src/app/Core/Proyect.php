<?php


namespace OnDezk\Estimate\App\Core;


class Proyect
{
    private $code;
    private $desc;
    private $actv;

    public function __construct($code, $desc, $actv)
    {
        $this->code = $code;
        $this->desc = $desc;
        $this->actv = $actv;
    }
}
