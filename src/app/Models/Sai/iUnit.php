<?php

namespace OnDezk\Estimate\App\Models\Sai;

use Illuminate\Database\Eloquent\Model;

class iUnit extends Model
{

    protected $connection = 'informix';
    protected $table      = 'cnune';
    protected $primaryKey = 'cnuneuneg';
    public $timestamps    = false;
    public $incrementing  = false;

    public static function getCode($name){
        $unit = iUnit::where('cnunedesc', 'like','%'.$name.'%')->first();
        return isset($unit) ? $unit->cnuneuneg : 0;
    }

}
