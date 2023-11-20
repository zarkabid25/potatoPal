<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TIASample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TIASampleController extends Controller
{
    public function index(){
        $tiaSample = TIASample::with(['receival' => function ($query) {
            $query->select(['id', 'grower_name', 'paddock_name', 'seed_variety', 'seed_generation', 'grower_docket_no']);
        }])->orderBy('id', 'DESC')->get();

        foreach ($tiaSample as $key=>$val){
            $tiaSample[$key]['created_at'] = date('Y-m-d H:i:s', strtotime($tiaSample[$key]['created_at']));
        }

        return view('portal.tia-sample.tia-sample', compact('tiaSample'));
    }

    public function tiaAddModal(Request $request){
        $receivalId = $request->id;
        $tiaID = $request->tiaId;

        $tiaSample = TIASample::with(['receival' => function ($query) {
            $query->select(['id', 'grower_name', 'paddock_name', 'seed_variety', 'seed_generation', 'grower_docket_no']);
        }])->where('id', $tiaID)->where('receival_id', $receivalId)->first();

        $tiaSample['date'] = date('m/d/Y', strtotime($tiaSample['date']));

        return response()->json(['status'=> 'true', 'data'=>$tiaSample]);
    }

    public function store(Request $request){
        $postData = $request->except(['_token', 'tia_id', 'tia_image']);

        if($request->has('excessive_dirt')){
            $postData['excessive_dirt'] = 'yes';
        }
        if($request->has('minor_skin_cracking')){
            $postData['minor_skin_cracking'] = 'yes';
        }
        if($request->has('skining')){
            $postData['skining'] = 'yes';
        }
        if($request->has('regrading')){
            $postData['regrading'] = 'yes';
        }

        if($request->has('tia_image')){
            $imageName = storeImage($request, 'tia_image');
            $postData['tia_image'] = $imageName;
        }

        $postData['seed_variet'] = json_encode($postData['seed_variet']);
        $postData['seed_generation'] = json_encode($postData['seed_generation']);
        $postData['paddock_no'] = json_encode($postData['paddock_no']);

        $result = TIASample::where('id', $request->tia_id)->update($postData);

        if($result == 1){
            return redirect()->route('tia-sample')->with('success', 'Updated successfully');
        }
        else{
            return redirect()->back()->with('success', 'Someting went wrong.');
        }
    }
}
