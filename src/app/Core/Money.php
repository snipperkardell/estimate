<?php


namespace OnDezk\Estimate\App\Core;


class Money
{
    private $value;
    private $change;
    private $currency;


    public function __construct(
        $value,
        $currency = 'BOB',
        $change   = 1
    ){
        $this->value    = $value;
        $this->currency = $currency;
        $this->change   = $change;
    }


}
