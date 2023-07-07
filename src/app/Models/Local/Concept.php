<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Phantom\app\Http\Traits\SaveToUpper;

class Concept extends Model{

    use SaveToUpper, SoftDeletes;

    protected $connection = 'pgsql';
    protected $table      = 'escon';
    protected $primaryKey = ['esconpref', 'esconcorr'];
    public $incrementing  = false;

    const CREATED_AT = 'esconfcrd';
    const UPDATED_AT = 'esconfupd';
    const DELETED_AT = 'esconfdel';


    protected static function boot(){
        parent::boot();
        static::creating(function ($query) {
            $query->bdstpcusr = Auth::id();
            $query->bdstpstte = 1;
        });
    }

    public function scopeAlias(){
        return $this->select($this->alias);
    }

    public static function getEstimateType(){
        $list = [];
        $operativo = ["code" => 1, "desc" => "PRESUPUESTO OPERATIVO"];
        $production = ["code" => 2, "desc" => "PRESUPUESTO PRODUCCION"];
        $inversion = ["code" => 3, "desc" => "PRESUPUESTO INVERSION"];
        $bpm        = ["code" => 4, "desc" => "PRESUPUESTO INVERSION PROYECTO BPM"];
        array_push($list, $operativo);
        array_push($list, $production);
        array_push($list, $inversion);
        array_push($list, $bpm);
        return $list;
    }

}
