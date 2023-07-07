<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Phantom\app\Http\Traits\SaveToUpper;

class Operativo extends Model{

    use SaveToUpper, SoftDeletes;

    protected $connection = 'pgsql';
    protected $table      = 'esopr';
    protected $primaryKey = 'esoprcmtr';
    public $incrementing  = false;

    const CREATED_AT = 'esoprfcrd';
    const UPDATED_AT = 'esoprfupd';
    const DELETED_AT = 'esoprfdel';


    protected static function boot(){
        parent::boot();
        static::creating(function ($query) {
            $query->esoprcusr = Auth::id();
            $query->esoprstte = 1;
        });
    }

    public function scopeAlias(){
        return $this->select($this->alias);
    }

    public function add($object){
        $this->esoprcmtr = $object->esmtrcorr;
        $this->esoprcprt = $object->esmtrcprt;
        $this->esoprdetl = $object->esmtrdetl;
        $this->esoprtmnt = $object->esmtrtmnt;
        $this->esoprcant = $object->esmtrcant;
        $this->esoprnmon = $object->esmtrnmon;
        $this->esopramon = $object->esmtramon;
        $this->esoprtcam = $object->esmtrtcam;
        $this->esoprcmon = $object->esmtrcmon;

        $this->esoprncat = $object->esmtrncat;
        $this->esoprccat = $object->esmtrccat;
        $this->save();
    }

}
