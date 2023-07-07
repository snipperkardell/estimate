<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Phantom\app\Http\Traits\SaveToUpper;

class Production extends Model{

    use SaveToUpper, SoftDeletes;

    protected $connection = 'pgsql';
    protected $table      = 'esprd';
    protected $primaryKey = 'esprdcmtr';
    public $incrementing  = false;

    const CREATED_AT = 'esprdfcrd';
    const UPDATED_AT = 'esprdfupd';
    const DELETED_AT = 'esprdfdel';


    protected static function boot(){
        parent::boot();
        static::creating(function ($query) {
            $query->esprdcusr = Auth::id();
            $query->esprdstte = 1;
        });
    }

    public function scopeAlias(){
        return $this->select($this->alias);
    }

    public function add($object){
        $this->esprdcmtr = $object->esmtrcorr;
        $this->esprdcprt = $object->esmtrcprt;
        $this->esprddetl = $object->esmtrdetl;
        $this->esprdtmnt = $object->esmtrtmnt;
        $this->esprdcant = $object->esmtrcant;
        $this->esprdnmon = $object->esmtrnmon;
        $this->esprdamon = $object->esmtramon;
        $this->esprdtcam = $object->esmtrtcam;
        $this->esprdcmon = $object->esmtrcmon;

        $this->esprdncat = $object->esmtrncat;
        $this->esprdccat = $object->esmtrccat;
        $this->save();
    }

}
