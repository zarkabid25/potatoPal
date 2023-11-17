<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Receival;
use App\Models\TIASample;
use App\Models\Unloading;
use App\Models\User;
use Illuminate\Http\Request;

class ReceivalsController extends Controller
{
    public function index(){

        $receivals = Receival::orderBy('id', 'DESC')->get();
//        $grower = User::with(['grower', 'paddock'])
//            ->select('id')
//            ->where('id', auth()->user()->id)
//            ->first();
//
//        if(!empty($grower->grower)){
//            $growerName = $grower->grower->grower_name;
//            $growerGroup = explode(',', json_decode($grower->grower->grower_group));
//        }
//        else{
//            $growerName = null;
//            $growerGroup = null;
//        }
//
//        if($grower->paddock){
//            $paddockName = json_decode($grower->paddock->paddock_name);
//        }
//        else{
//            $paddockName = null;
//        }

        return view('portal.receival.all-receivals', compact('receivals'));
    }

    public function store(Request $request){

        $postData = $request->except('_token');
        $postData['grower_group'] = json_encode($request->grower_group);
        $postData['paddock_name'] = json_encode($request->paddock_name);
        $postData['seed_variety'] = json_encode($request->seed_variety);
        $postData['seed_generation'] = json_encode($request->seed_generation);
        $postData['seed_class'] = json_encode($request->seed_class);
        $postData['seed_type'] = json_encode($request->seed_type);
        $postData['transport_co'] = json_encode($request->transport_co);
        $postData['delivery_type'] = json_encode($request->delivery_type);
        $postData['fungicide'] = json_encode($request->fungicide);
        $postData['user_id'] = auth()->user()->id;

        try{
            $result = Receival::create($postData);

            if($result){
                return redirect()->route('all-receivals')->with('success', 'Receival added successfully.');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        } catch(\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function edit(Request $request){
        try{
            $receival = Receival::where('id', $request->id)->first();

            return response()->json(['status' => 'true', 'data' => $receival]);

        } catch(\Exception $ex){
            return response()->json(['status' => 'false', 'error' => $ex->getMessage()]);
        }
    }

    public function update(Request $request){
        try{
            $postData = $request->except('_token');
            $postData['grower_group'] = json_encode($request->grower_group);
            $postData['paddock_name'] = json_encode($request->paddock_name);
            $postData['seed_variety'] = json_encode($request->seed_variety);
            $postData['seed_generation'] = json_encode($request->seed_generation);
            $postData['seed_class'] = json_encode($request->seed_class);
            $postData['seed_type'] = json_encode($request->seed_type);
            $postData['transport_co'] = json_encode($request->transport_co);
            $postData['delivery_type'] = json_encode($request->delivery_type);
            $postData['fungicide'] = json_encode($request->fungicide);

            $result = Receival::where('id', $postData['id'])->update($postData);

            if($result){
                return redirect()->route('all-receivals')->with('success', 'Receival updated successfully.');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        } catch(\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function delete($id){
        $receival = Receival::where('id', $id)->delete();

        if($receival == 1){
            return redirect()->back()->with('success', 'Receival has deleted successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function Unload(Request $request){
        $result = Unloading::create(['receival_id' => $request->receivalID]);

        if($result){
            Receival::where('id', $request->receivalID)->update(['unloading_push_status' => 1]);
            return response()->json(['status' => true]);
        }
        else{
            return response()->json(['status' => false]);
        }
    }

    public function pushTIA(Request $request){
        $result = TIASample::create(['receival_id' => $request->receivID]);

        if($result){
            Receival::where('id', $request->receivID)->update(['tia_sample_push' => 1]);
            return response()->json(['status' => true]);
        }
        else{
            return response()->json(['status' => false]);
        }
    }
}

