<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Paddock;
use Illuminate\Http\Request;

class PaddockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $paddocks = Paddock::all();

        $html = view('portal.admin-options.get-paddock', compact('paddocks'))->render();
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
        $result = Paddock::create([
            'paddock_name' => $request->paddock,
            'no_of_hectares' => $request->no_of_hectares,
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
        $paddock = Paddock::where('id', $id)->first();
        return response()->json(['data' => $paddock]);
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
        $result = Paddock::where('id', $id)->update([
            'paddock_name' => $request->paddock,
            'no_of_hectares' => $request->no_of_hectares,
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
        $result = Paddock::where('id', $id)->delete();

        if($result){
            return redirect()->back()->with('success', 'Successfully deleted.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
