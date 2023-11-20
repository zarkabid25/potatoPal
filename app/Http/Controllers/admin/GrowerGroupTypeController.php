<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GrowerGroupType;
use Illuminate\Http\Request;

class GrowerGroupTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $gowerGroups = GrowerGroupType::all();

        $html = view('portal.admin-options.get-grower-type', compact('gowerGroups'))->render();
        return response()->json(['data' => $html]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $result = GrowerGroupType::create([
            'name' => $request->grower_group_type,
            'user_id' => auth()->user()->id,
        ]);

        if($result){
            return redirect()->back()->with('success', 'Successfully create.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $growerType = GrowerGroupType::where('id', $id)->first();
        return response()->json(['data' => $growerType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $result = GrowerGroupType::where('id', $id)->update([
            'name' => $request->grower_group_type
        ]);

        if($result){
            return redirect()->back()->with('success', 'Successfully updated.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = GrowerGroupType::where('id', $id)->delete();

        if($result){
            return redirect()->back()->with('success', 'Successfully deleted.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
