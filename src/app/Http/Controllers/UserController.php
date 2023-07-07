<?php

namespace Liffe\Budget\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Liffe\Gestion\App\Models\Sai\iUsers;

class UserController extends Controller{


    public function userCombo(Request $request){
        $search = $request->srch;
        return iUsers::users($search);
    }

    public function userSuperior(Request $request){
        $search = $request->srch;
        return iUsers::users($search);
    }

    public function userPresup(Request $request){
        $search = $request->srch;
        return iUsers::users($search);
    }

    public function userGerencias(Request $request){
        $search = $request->srch;
        return iUsers::users($search);
    }

}
