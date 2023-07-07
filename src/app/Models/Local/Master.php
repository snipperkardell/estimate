<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Phantom\app\Http\Traits\SaveToUpper;

class Master extends Model{

    use SaveToUpper, SoftDeletes;

    protected $connection = 'pgsql';
    protected $table      = 'esmtr';
    protected $primaryKey = 'esmtrcorr';
    public $incrementing  = false;

    const CREATED_AT = 'esmtrfcrd';
    const UPDATED_AT = 'esmtrfupd';
    const DELETED_AT = 'esmtrfdel';

    const OPERATIVO  = 1;
    const PRODUCTION = 2;
    const INVERSION  = 3;
    const ACTIVOS    = 4;

    protected static function boot(){
        parent::boot();
        static::creating(function ($query) {
            $query->esmtrcorr = Master::max('esmtrcorr') + 1;
            $query->esmtrcprt = $query->esmtrcorr;
            $query->esmtrcusr = Auth::id();
            $query->esmtrstte = 1;
        });
    }

    public function model($query){
        $model = $query->esmtrcsrc;
        switch ($model){
            case self::OPERATIVO :
                (new Operativo())->add($query);
                break;
            case self::PRODUCTION :
                (new Production())->add($query);
                break;
            case self::INVERSION :
                (new Inversion())->add($query);
                break;
            case self::ACTIVOS :
//                (new ())->add($query);
                break;
        }
    }

    public function scopeAlias(){
        return $this->select($this->alias);
    }

}
