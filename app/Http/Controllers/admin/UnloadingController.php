<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Receival;
use App\Models\Unloading;
use Illuminate\Http\Request;

class UnloadingController extends Controller
{
    public function index(){
        $unloading = Unloading::with('receival')->get();

        return view('portal.unloading.all-unloadings', compact('unloading'));
    }

    public function edit(Request $request){
        $unloading = Unloading::with(['receival' => function ($query) use ($request) {
            $query->select(['id', 'grower_name', 'unloading_status', 'seed_bin_size', 'oversize_bin_size', 'fungicide', 'created_at'])
                ->where('id', $request->id);
        }])
        ->whereHas('receival', function ($query) use ($request) {
            $query->where('id', $request->id);
        })
        ->first();
        $unloading['receival']['created_at'] = date('Y-m-d', strtotime($unloading->receival->created_at));

        return response()->json(['status' => 'true', 'data' => $unloading]);
    }

    public function update(Request $request){
        try{
            Unloading::where('id', $request->id)->update([
                'seed_bin_weight' => $request->no_of_seeding_bins,
                'weight_bins' => $request->weighed_bin,
                'weighed_weight' => $request->weighed_weight,
                'no_oversize_bins' => $request->no_oversize_bins
            ]);

            $result = Receival::where('id',$request->r_id)->update([
                'grower_name' => json_encode($request->grower_name),
                'receival_id' => json_encode($request->receival_id),
                'unloading_status' => $request->unloading_status,
                'seed_bin_size' => $request->seed_bin_size,
                'oversize_bin_size' => $request->oversize_bin_size,
                'fungicide' => json_encode($request->fungicide),
            ]);

            if($result){
                return redirect()->route('all-receivals')->with('success', 'Receival updated successfully.');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
