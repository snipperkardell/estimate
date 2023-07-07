<?php

namespace OnDezk\Estimate\App\Models\Local;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Phantom\App\Http\Traits\HasCompositePrimaryKey;
use Phantom\app\Http\Traits\SaveToUpper;

class Reasign extends Model {

    use SaveToUpper, SoftDeletes;

    protected $connection = 'pgsql';
    protected $table      = 'esrsg';
    protected $primaryKey = 'esrsgcrsg';
    public $incrementing  = false;

    const CREATED_AT = 'esrsgfcrd';
    const UPDATED_AT = 'esrsgfupd';
    const DELETED_AT = 'esrsgfdel';


    public function register(){
        $this->counter();
        $this->base();
        $this->save();
    }

    public function setParams($master, $detail){
        $info = (new \OnDezk\RoadMap\app\Core\Estimate())->getEstimate($master, $detail);
        $this->esrsgcmtr = $master;
        $this->esrsgcorr = $detail;
        $this->esrsgdetl = $info->detl;
        $this->esrsgtmnt = $info->blnc;
        $this->esrsgcant = $info->cant;
    }


    private function base(){
        $this->esrsgcusr = Auth::id();
        $this->esrsgstte = 1;
    }

    private function counter(){
        $this->esrsgcrsg = Reasign::withTrashed()
                ->max('esrsgcrsg') + 1;
    }

}
