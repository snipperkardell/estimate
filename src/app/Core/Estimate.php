<?php


namespace OnDezk\Estimate\App\Core;


class Estimate
{
    private $month;
    private $amount;
    private $quantity;

    public function __construct($month, $amount, $quantity)
    {
        $this->month     = (new Month($month));
        $this->amount    = $amount;
        $this->quantity  = $quantity;
    }

    public function getEstimate(){
        return $this->isValidMount() ? $this : null;
    }

    public function isValidMount(){
        $amount = $this->amount;
        return $amount > 0 ? true : false;
    }

    public function getMonth(): Month{
        return $this->month;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getQuantity(){
        return $this->quantity;
    }



}
