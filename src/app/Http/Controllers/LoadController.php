<?php

namespace OnDezk\Estimate\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Collection;
use OnDezk\Estimate\app\Imports\EstimateImport;
use OnDezk\Estimate\App\Models\Local\Detail;
use OnDezk\Estimate\App\Models\Local\Master;

class LoadController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('estimate::kernel.load.index');
    }


    public function loadFile(Request $request)
    {
        ini_set('max_execution_time', 360);
        ini_set('memory_limit', -1);
        $this->validateFile($request);
        $extracto = $this->formatFile($request);
//        dd($extracto);
        //save on databases
        $type = $request->type;
        $this->importFile($extracto, $type);
        echo "Carga Completa!!!";
    }

    public function importFile($extracto, $type){
        // dd($extracto);
        foreach ($extracto as $item){
            $this->addMaster($item, $type);
        }
    }

    private function addMaster($item, $type){
        $estimate = (object) $item;
        $master = new Master;
        $master->esmtrdetl = $estimate->aplicacion;
        $master->esmtrnsrc = $type;
        $master->esmtrcsrc = $type;// default
        $master->esmtrinig = 2023;// default
        $master->esmtrendg = 2024;// default
        $master->esmtrnges = "2023-2024-t";// default
        $master->esmtrcges = 12;// default
        $master->esmtrnung = $estimate->u_negocio;
        $master->esmtrcung = $estimate->u_negocio;// default

        $master->esmtrnapp = $estimate->aplicacion;
        $master->esmtrcapp = $estimate->cod_aplicc;
        $master->esmtrncct = $estimate->c_costo;
        $master->esmtrccct = $estimate->cod_c_costo;
        $master->esmtrnuni = isset($estimate->um) ? $estimate->um : "unidad";//$estimate->um; //conditional
        $master->esmtrcuni = 1;//default

        $master->esmtrncat = isset($estimate->categoria) ? $estimate->categoria : "nn"; //conditional
        $master->esmtrccat = 0;//default

        
        $master->esmtrnsar = "SUBAREA"; //default
        $master->esmtrcsar = 1; //default
        $master->esmtrnfrc = "MENSUAL"; //default
        $master->esmtrcfrc = 1;//default

        $master->esmtrtmnt = isset($estimate->total) ? $estimate->total : 0; //$estimate->total;    //conditional
        $master->esmtrcant = isset($estimate->cantidad) ? $estimate->cantidad : 0; //$estimate->cantidad; //conditional
        $master->esmtrnmon = "BOLIVIANOS"; //default
        $master->esmtramon = "BOB"; //default
        $master->esmtrtcam = 1; //--default
        $master->esmtrcmon = 1; //--default

        //--new structure 
        // $master->esmtrcare = $estimate->n0_area;
        // $master->esmtrcmon = $estimate->area;
        $master->esmtrnare = $estimate->area;
        $master->esmtrcare = $estimate->n0_area; //default
        $master->save();
        // dd($master);
        $master->model($master);
        (new Detail())->list($master, $item);
    }

    private function validateFile(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'temp' => 'required',
        ]);
    }

    private function formatFile(Request $request)
    {
        $extracto = $this->readFile($request);
        $complete = array();
        foreach ($extracto as $sheet){
            if($sheet){
                $complete = array_merge($complete, $sheet);
            }
        }
        return $complete;
    }

    private function readFile(Request $request, $filename = 'temp')
    {
        $outer = [];
        if($request->hasFile($filename)){
            $tempPath = request()->file($filename);
            $outer = (new EstimateImport)->toArray($tempPath);
        }
        return $outer;
    }

}
