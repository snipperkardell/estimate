<?php


namespace OnDezk\Estimate\App\Core;


class Month
{

    public $code;
    public $desc;
    public $ordn;

    const JANUARY   = 1;
    const FEBRUARY  = 2;
    const MARCH     = 3;
    const APRIL     = 4;
    const MAY       = 5;
    const JUNE      = 6;
    const JULY      = 7;
    const AUGUST    = 8;
    const SEPTEMBER = 9;
    const OCTOBER   = 10;
    const NOVEMBER  = 11;
    const DECEMBER  = 12;

    public function __construct($code)
    {
        $this->code  = $code;
        $this->autoComplete();
    }

    private function autoComplete(){
        switch ($this->code){
            case self::JANUARY:
                $this->desc = "ENERO";
                $this->ordn = 10;
                break;
            case self::FEBRUARY:
                $this->desc = "FEBRERO";
                $this->ordn = 11;
                break;
            case self::MARCH:
                $this->desc = "MARZO";
                $this->ordn = 12;
                break;
            case self::APRIL:
                $this->desc = "ABRIL";
                $this->ordn = 1;
                break;
            case self::MAY:
                $this->desc = "MAYO";
                $this->ordn = 2;
                break;
            case self::JUNE:
                $this->desc = "JUNIO";
                $this->ordn = 3;
                break;
            case self::JULY:
                $this->desc = "JULIO";
                $this->ordn = 4;
                break;
            case self::AUGUST:
                $this->desc = "AGOSTO";
                $this->ordn = 5;
                break;
            case self::SEPTEMBER:
                $this->desc = "SEPTIEMBRE";
                $this->ordn = 6;
                break;
            case self::OCTOBER:
                $this->desc = "OCTUBRE";
                $this->ordn = 7;
                break;
            case self::NOVEMBER:
                $this->desc = "NOVIEMBRE";
                $this->ordn = 8;
                break;
            case self::DECEMBER:
                $this->desc = "DICIEMBRE";
                $this->ordn = 9;
                break;
        }
    }

}
