<?php

namespace OnDezk\Estimate\App\Core;

abstract class BudgetAbstract implements BudgetInterface {

    private $code;
    private $part;
    private $type;
    private $stte;
    private $resp;

    public $name;
    public $glos;
    public $gest;
    public $date;
    public $uneg;
    public $appl;
    public $ccos;
    public $pres;
    public $unid;
    public $cant;
    public $frec;
    public $area;
    public $suba;

    public function __construct()
    {

    }

}
