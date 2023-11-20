<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SeedTpye;
use Illuminate\Http\Request;

class SeedTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $seedTypes = SeedTpye::all();

        $html = view('portal.admin-options.get-seed-type', compact('seedTypes'))->render();

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
        $result = SeedTpye::create([
            'name' => $request->seed_type
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
        $seedType = SeedTpye::where('id', $id)->first();
        return response()->json(['data' => $seedType]);
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
        $result = SeedTpye::where('id', $id)->update([
            'name' => $request->seed_type
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
        $result = SeedTpye::where('id', $id)->delete();

        if($result){
            return redirect()->back()->with('success', 'Successfully deleted.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
