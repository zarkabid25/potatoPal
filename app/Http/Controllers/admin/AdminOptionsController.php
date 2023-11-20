<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BuyerGroupType;
use App\Models\DeliveryType;
use App\Models\Fungicide;
use App\Models\GrowerGroupType;
use App\Models\Paddock;
use App\Models\SeedClass;
use App\Models\SeedGeneration;
use App\Models\SeedTpye;
use App\Models\SeedVariety;
use Illuminate\Http\Request;

class AdminOptionsController extends Controller
{
    public function getSeedClasses(){
        //
    }

    public function getdeliveryType(){
        $deliveryTypes = DeliveryType::all();

        $html = view('portal.admin-options.getSeedClasses', compact('deliveryTypes'))->render();

        return response()->json(['data' => $html]);
    }
    public function seedClass(Request $request){
        //
    }

    public function deliveryType(Request $request){
        //
    }

    public function fungicide(Request $request){
        //
    }

    public function seedGeneration(Request $request){
        //
    }

    public function buyerGroupType(Request $request){
        //
    }

    public function growerGroupType(Request $request){
        //
    }

    public function paddock(Request $request){
        //
    }

    public function seedType(Request $request){
        //
    }

    public function seedVariety(Request $request){
        //
    }
}
