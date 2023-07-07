<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Phantom\app\Http\Traits\SaveToUpper;

class Categoria extends Model{

    use SaveToUpper;

    protected $connection = 'pgsql';
    protected $table      = 'bdcat';
    protected $primaryKey = 'bdcatcorr';
    public $incrementing  = false;

    public static function getCode($desc){
        $object = Categoria::where("bdcatdesc", "like", '%'.$desc.'%')->first();
        return isset($object) ? $object->bdcatcorr : 0;
    }

}
