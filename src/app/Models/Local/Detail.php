<?php

namespace OnDezk\Estimate\App\Models\Local;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use OnDezk\Estimate\App\Core\Estimate;
use Phantom\App\Http\Traits\HasCompositePrimaryKey;
use Phantom\app\Http\Traits\SaveToUpper;

class Detail extends Model{

    use SaveToUpper, SoftDeletes, HasCompositePrimaryKey;

    protected $connection = 'pgsql';
    protected $table      = 'esdtl';
    protected $primaryKey = ['esdtlcmtr', 'esdtlcorr'];
    public $incrementing  = false;

    const CREATED_AT = 'esdtlfcrd';
    const UPDATED_AT = 'esdtlfupd';
    const DELETED_AT = 'esdtlfdel';

    protected function setKeysForSaveQuery(Builder $query)
    {
        return $query->where('esdtlcmtr', $this->getAttribute('esdtlcmtr'))
            ->where('esdtlcorr', $this->getAttribute('esdtlcorr'));
    }

    protected static function boot(){
        parent::boot();
        static::creating(function ($query) {
            $query->esdtlcusr = Auth::id();
            $query->esdtlstte = 1;
            $query->esdtlcorr = Detail::correlative($query->esdtlcmtr);
        });
    }

    public function scopeAlias(){
        return $this->select($this->alias);
    }

    public function scopeCorrelative($query, $masterCode){
         return Detail::where('esdtlcmtr', $masterCode)->max('esdtlcorr') + 1;
    }

    public function list($master, $estimate){
        $list = $this->generateCalendar($master, $estimate);
        // dd($list);
        foreach ($list as $item){
            if(isset($item)){
                $this->add($master, $item);
            }
        }
    }

    private function generateCalendar($master, $estimate){
        $list    = [];
        $months  = $estimate;
        $cant    = $master->esmtrcant;
        $program = $this->generateProgramation($months);
        $index = 1;
        foreach ($program as $item){
            $estimate = $this->addEstimate($index, $item, $cant);
            array_push($list, $estimate);
            $index++;
        }
        return $list;
    }

    private function generateProgramation($master){
        $master = array_filter($master, function($value, $key) {return !is_null($key) && $key !== ''; }, ARRAY_FILTER_USE_BOTH);
        $salida = array_slice($master, -12);
        return count($salida) == 12 ? $salida : [];
    }

    private function addEstimate($month, $amount, $quantity){
        $estimate = (new Estimate($month, $amount, $quantity))->getEstimate();
        return $estimate <> null ? $estimate : null;
    }

    private function add($general, $item){
        $detail = new Detail;
        $detail->esdtlcmtr = $general->esmtrcorr;
        $detail->esdtlcprt = $general->esmtrcprt;
        $detail->esdtldetl = $general->esmtrdetl;

        $detail->esdtlnmon = $general->esmtrnmon;
        $detail->esdtlamon = $general->esmtramon;
        $detail->esdtltcam = $general->esmtrtcam;
        $detail->esdtlcmon = $general->esmtrcmon;

        $detail->esdtltmnt = $item->getAmount();
        $detail->esdtlcant = $item->getQuantity();
        $detail->esdtlnmth = $item->getMonth()->desc;
        $detail->esdtlcmth = $item->getMonth()->code;

        $this->esdtlncat = $general->esmtrncat;
        $this->esdtlccat = $general->esmtrccat;

        $detail->save();
    }

}
