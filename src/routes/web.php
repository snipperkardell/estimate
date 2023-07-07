<?php

//--- section configuration
Route::prefix('gestion')->group(function () {
    Route::get('index', 'LoadController@index')->name('estimate.gestion.index');
});

Route::prefix('area')->group(function () {
    Route::get('index', 'LoadController@index')->name('estimate.area.index');
});

Route::prefix('concept')->group(function () {
    Route::get('index', 'LoadController@index')->name('estimate.area.index');
});

Route::prefix('load-template')->group(function () {
    Route::get('index', 'LoadController@index')->name('estimate.load.index');
    Route::post('store', 'LoadController@loadFile');
});

Route::prefix('reasign')->group(function () {
    Route::get('index', 'ReasignController@index')->name('estimate.reasign.index');
    Route::get('kardex/{master}/{detail}', 'ReasignController@kardex');
    Route::post('store/{master}/{detail}', 'ReasignController@store');
    Route::post('update/{master}/{detail}', 'ReasignController@change');
});


Route::get('check-budget', function (){
    $query = 'select esdtl.*
              from esmtr full outer join esdtl
                on esmtrcorr = esdtlcmtr
              where esmtrcorr is null
                or esdtlcmtr is null';
    $lista = DB::select($query);
    $count = 1;
    foreach ($lista as $item){
        if ($item->esdtlcmtr){
            $key = [$item->esdtlcmtr, $item->esdtlcorr];
            $reg = \OnDezk\Estimate\App\Models\Local\Detail::find($key);
            $reg->forceDelete();
            echo $count.'<br>';
            $count++;
        }
    }
    dd(123);
});

//Route::get("update-master", function (){
//    $list = \OnDezk\Estimate\App\Models\Local\Master::where('esmtrcorr', '>', 3498)->get();
//    foreach ($list as $item){
//        //|
//        $item->esmtrnmov = "LOAD ESTIMATE";
//        $item->esmtrcmov = 1;
//        $item->update();
//    }
//    dd("end 1 ... ");
//});

//Route::get("update-master", function (){
//    $list = \OnDezk\Estimate\App\Models\Local\Master::where('esmtrcorr', '>', 3498)->get();
//    foreach ($list as $item){
//        $oper = \OnDezk\Estimate\App\Models\Sai\iUnit::getCode($item->esmtrnung);
//        $item->esmtrcung = $oper;
//        $item->update();
//    }
//    dd("end 3 ... ");
//});

//Route::get("update-master", function (){
//    $list = \OnDezk\Estimate\App\Models\Local\Master::where('esmtrcorr', '>', 3498)->get();
//    foreach ($list as $item){
//        $oper = \OnDezk\Estimate\App\Models\Local\Detail::where('esdtlcmtr', $item->esmtrcorr)->get();
//        foreach ($oper as $obj){
//            $obj->esdtlncat = $item->esmtrncat;
//            $obj->esdtlccat = $item->esmtrccat;
//            $obj->update();
//        }
//    }
//    dd("end 123");
//});

//Route::get("update-master", function (){
//    $list = \OnDezk\Estimate\App\Models\Local\Master::where('esmtrcorr', '>', 3498)->get();
//    foreach ($list as $item){
//        $item->esmtrccat = \OnDezk\Estimate\App\Models\Local\Categoria::getCode($item->esmtrncat);
//        $item->update();
//    }
//    dd("load");
//});


Route::get("update-master", function (){

    ini_set('max_execution_time', 360);

    $list = \OnDezk\Estimate\App\Models\Local\Master::where('esmtrcorr', '>', 3498)->get();
    foreach ($list as $item){
        $detail = \OnDezk\Estimate\App\Models\Local\Detail::where("esdtlcmtr", $item->esmtrcorr)->get();
        foreach ($detail as $mdetal){
            $month = $mdetal->esdtlcmth < 10 ? "0".$mdetal->esdtlcmth : $mdetal->esdtlcmth;
            $presup = new \Liffe\Budget\App\Models\Local\Presupuesto;
            $presup->bdprsfech = "2021-".$month."-01";
            $presup->bdprscges = 10;
            $presup->bdpmicung = 1;
            $presup->bdpmicare = 5;
            $presup->bdpmicsar = 0;
            $presup->bdpmicapl = $item->esmtrcapp;
            $presup->bdpmiccos = $item->esmtrccct;
            $presup->bdpmicacr = 0;
            $presup->bdpmicacr = 0;
            $presup->bdpmipres = $mdetal->esdtltmnt;
            $presup->bdpmirpre = $mdetal->esdtltmnt;
            $presup->bdprsgls1 = $item->esmtrdetl;
            $presup->bdprsgls2 = $item->esmtrdetl;
            $presup->bdprscprt = "NEW-PRTD-21-22";
            $presup->bdprscant = 1;
            $presup->bdprscuni = 1;
            $presup->bdprsnuni = $item->esmtrnuni;
            $presup->bdprsnges = "2021-2022";
            $presup->bdprsopre = $mdetal->esdtltmnt;
            $presup->bdprsocan = 1;
            $presup->bdprsrcan = 1;
            $presup->bdprsnung = $item->esmtrnung;
            $presup->save();
        }
    }

    dd("end .... ");
});
