<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $files = File::all();

        $organizedFiles = [];
        foreach ($files as $file) {
            $date = date('d, M Y', strtotime($file->created_at));
            $organizedFiles[$date][] = [
                'id' => $file->id,
                'title' => $file->title,
                'image' => $file->f_img,
            ];

            $slider[] = [
                    'id' => $file->id,
                    'title' => $file->title,
                    'image' => $file->f_img,
                    'date' => $date,
                ];
        }

        return view('portal.files.all-files', compact('organizedFiles', 'slider'));
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
        $postData = $request->except('_token', 'f_img');

        if($request->has('f_img') && !empty($request->f_img)){
            $imageName = storeImage($request, 'f_img');
            $postData['f_img'] = $imageName;
        }
        $result = File::create($postData);

        if($result){
            return redirect()->route('file.index')->with('success', 'Successfully created');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong.');
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
        $file = File::where('id', $id)->first();

        return response()->json(['status' => true, 'data' => $file]);
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
        $postData = $request->except('_token', 'f_img', '_method');

        if($request->has('f_img') && !empty($request->f_img)){
            $imageName = storeImage($request, 'f_img');
            $postData['f_img'] = $imageName;
        }
        $result = File::where('id', $id)->update($postData);

        if($result){
            return redirect()->route('file.index')->with('success', 'Successfully created');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong.');
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
        $result = File::where('id', $id)->delete();

        if($result){
            return redirect()->route('file.index')->with('success', 'Successfully deleted');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
