<?php


namespace OnDezk\Estimate\App\Core;


class Responsible
{
    private $code;
    private $desc;

    public function __construct($code, $desc){
        $this->code = $code;
        $this->desc = $desc;
    }

}
