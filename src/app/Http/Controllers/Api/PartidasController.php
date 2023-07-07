<?php

namespace OnDezk\Estimate\App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class PartidasController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

}
