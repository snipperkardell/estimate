<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Phantom\app\Http\Traits\SaveToUpper;

class Gestion extends Model{

    use SaveToUpper, SoftDeletes;

    protected $connection = 'pgsql';
    protected $table      = 'esges';
    protected $primaryKey = 'esgescorr';
    public $incrementing  = false;

    const CREATED_AT = 'esgesfcrd';
    const UPDATED_AT = 'esgesfupd';
    const DELETED_AT = 'esgesfdel';


    protected static function boot(){
        parent::boot();
        static::creating(function ($query) {
            $query->esgescusr = Auth::id();
            $query->esgesstte = 1;
        });
    }

    public function scopeAlias(){
        return $this->select($this->alias);
    }


}
