<?php

namespace OnDezk\Estimate\App\Http\Controllers;

use App\Http\Controllers\Controller;

class AreaController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

}
