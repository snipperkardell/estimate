<?php

namespace OnDezk\Estimate\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use OnDezk\Estimate\App\Models\Local\Detail;
use OnDezk\Estimate\App\Models\Local\Reasign;
use OnDezk\RoadMap\app\Core\Estimate;

class ReasignController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('estimate::kernel.reasign.index');
    }

    public function kardex($mcode, $dcode){
        $master = (new Estimate)->getEstimate($mcode, $dcode);
        return view('estimate::kernel.reasign.kardex', compact('master'));
    }

    public function store($mcode, $dcode){
        $reasign = new Reasign;
        $reasign->setParams($mcode, $dcode);
        $reasign->register();

        $detail = Detail::find([$mcode, $dcode]);
        $detail->esdtlstte = 2;
        $detail->update();
    }

    public function change(Request $request, $master, $item){
        $request->validate([
            'refr' => 'required',
            'cant' => 'required',
            'pred' => 'required',
        ]);
        $cdate = date_create($request->pred);
        $month = $cdate->format('m');

        $info = Detail::find([$master, $item]);

        if($info->esdtlstte == 1){
            $detail = new Detail();
            $detail->esdtlcmtr = $master;
            $detail->esdtlcprt = $master;
            $detail->esdtldetl = $info->esdtldetl;
            $detail->esdtltmnt = $request->refr;
            $detail->esdtlcant = $request->cant;
            $detail->esdtlnmon = $info->esdtlnmon;
            $detail->esdtlamon = $info->esdtlamon;
            $detail->esdtltcam = $info->esdtltcam;
            $detail->esdtlcmon = $info->esdtlcmon;
            $detail->esdtlnmth = $this->getMoth($month);
            $detail->esdtlcmth = $month;
            $detail->esdtlncat = 'REASIGNADO - '. $info->esdtlcorr;
            $detail->esdtlccat = $info->esdtlcorr;
            $detail->save();

            $info->esdtlstte = 2;
            $info->update();
            return $detail->esdtlcorr;
        }else{
            $message = ['Presupuesto Reasignado Anteriormente.'];
            return $this->errorMessage($message);
        }

    }

    private function getMoth($moth){
        $name = '';
        switch ($moth){
            case 1:
                $name = 'ENERO';
                break;
            case 2:
                $name = 'FEBRERO';
                break;
            case 3:
                $name = 'MARZO';
                break;
            case 4:
                $name = 'ABRIL';
                break;
            case 5:
                $name = 'MAYO';
                break;
            case 6:
                $name = 'JUNIO';
                break;
            case 7:
                $name = 'JULIO';
                break;
            case 8:
                $name = 'AGOSTO';
                break;
            case 9:
                $name = 'SEPTIEMBRE';
                break;
            case 10:
                $name = 'OCTUBRE';
                break;
            case 11:
                $name = 'NOVIEMBRE';
                break;
            case 12:
                $name = 'DICIEMBRE';
                break;
        }
        return $name;
    }

}
