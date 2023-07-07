<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Phantom\app\Http\Traits\SaveToUpper;

class Inversion extends Model{

    use SaveToUpper, SoftDeletes;

    protected $connection = 'pgsql';
    protected $table      = 'esinv';
    protected $primaryKey = 'esinvcmtr';
    public $incrementing  = false;

    const CREATED_AT = 'esinvfcrd';
    const UPDATED_AT = 'esinvfupd';
    const DELETED_AT = 'esinvfdel';


    protected static function boot(){
        parent::boot();
        static::creating(function ($query) {
            $query->esinvcusr = Auth::id();
            $query->esinvstte = 1;
        });
    }

    public function scopeAlias(){
        return $this->select($this->alias);
    }

    public function add($object){
        $this->esinvcmtr = $object->esmtrcorr;
        $this->esinvcprt = $object->esmtrcprt;
        $this->esinvdetl = $object->esmtrdetl;
        $this->esinvtmnt = $object->esmtrtmnt;
        $this->esinvcant = $object->esmtrcant;
        $this->esinvnmon = $object->esmtrnmon;
        $this->esinvamon = $object->esmtramon;
        $this->esinvtcam = $object->esmtrtcam;
        $this->esinvcmon = $object->esmtrcmon;

        $this->esinvncat = $object->esmtrncat;
        $this->esinvccat = $object->esmtrccat;

        $this->save();
    }

}
