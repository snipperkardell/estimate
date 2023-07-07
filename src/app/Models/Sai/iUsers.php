<?php

namespace Liffe\Budget\App\Models\Sai;

use Illuminate\Database\Eloquent\Model;

class iUsers extends Model{

    protected $connection = 'informix';
    protected $table      = 'gbage';
    protected $primaryKey = 'gbagecage';
    public $timestamps    = false;
    public $incrementing  = false;

    protected $alias = [
        'gbagecage as cemp',
        'gbagenomb as desc',
    ];

    public function scopeAlias(){
        return $this->select($this->alias);
    }

    public function scopeName($query, $code){
        return $query->select('gbagenomb as name')
                     ->where('gbagecage', $code)
                     ->first()
                     ->name;
    }

    public function scopeActives($query, $find){
        $find = strtoupper($find);
        return $query
            ->alias()
            ->where('gbagestat', 1)
            ->where('gbagenomb', 'like', "%$find%")
            ->orderBy('gbagecage')
            ->get();
    }

    public function scopeUsersValid($query, $find, $exclude = []){
        $find = strtoupper($find);
        return $query
            ->alias()
            ->where('gbagestat', 1)
            ->where('gbagenomb', 'like', "%$find%")
            ->whereNotIn('gbagecage', $exclude)
            ->orderBy('gbagecage')
            ->get();
    }

    public function scopeUsersList($query, $include = []){
        return $query
            ->alias()
            ->whereIn('gbagecage', $include)
            ->orderBy('gbagecage')
            ->get();
    }

}
