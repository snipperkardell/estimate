<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Phantom\app\Http\Traits\SaveToUpper;

class Area extends Model{

    use SaveToUpper, SoftDeletes;

    protected $connection = 'pgsql';
    protected $table      = 'esare';
    protected $primaryKey = 'esarecorr';
    public $incrementing  = false;

    const CREATED_AT = 'esarefcrd';
    const UPDATED_AT = 'esarefupd';
    const DELETED_AT = 'esarefdel';


    protected static function boot(){
        parent::boot();
        static::creating(function ($query) {
            $query->esarecusr = Auth::id();
            $query->esarestte = 1;
        });
    }

    public function scopeAlias(){
        return $this->select($this->alias);
    }


}
