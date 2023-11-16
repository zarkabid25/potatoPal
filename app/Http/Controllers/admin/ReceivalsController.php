<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grower;
use App\Models\User;

class ReceivalsController extends Controller
{
    public function index(){
        $grower = User::with(['grower', 'paddock'])
            ->select('id')
            ->where('id', auth()->user()->id)
            ->first();

        if(!empty($grower->grower)){
            $growerName = $grower->grower->grower_name;
            $growerGroup = explode(',', json_decode($grower->grower->grower_group));
        }
        else{
            $growerName = null;
            $growerGroup = null;
        }

        if($grower->paddock){
            $paddockName = json_decode($grower->paddock->paddock_name);
        }

        return view('portal.receival.all-receivals', compact('growerName', 'growerGroup', 'paddockName'));
    }
}

