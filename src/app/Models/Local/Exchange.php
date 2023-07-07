<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Phantom\app\Http\Traits\SaveToUpper;

class Exchange extends Model{

    use SaveToUpper, SoftDeletes;

    protected $connection = 'pgsql';
    protected $table      = 'esexc';
    protected $primaryKey = 'esexccorr';
    public $incrementing  = false;

    const CREATED_AT = 'esexcfcrd';
    const UPDATED_AT = 'esexcfupd';
    const DELETED_AT = 'esexcfdel';


    protected static function boot(){
        parent::boot();
        static::creating(function ($query) {
            $query->esexccusr = Auth::id();
            $query->esexcstte = 1;
        });
    }

    public function scopeAlias(){
        return $this->select($this->alias);
    }


}
