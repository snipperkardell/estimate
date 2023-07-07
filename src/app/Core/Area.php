<?php


namespace OnDezk\Estimate\App\Core;


class Area
{
    private $code;
    private $desc;
    private $suba;

    public function __construct($code, $desc, $suba)
    {
        $this->code = $code;
        $this->desc = $desc;
        $this->suba = $suba;
    }
}
