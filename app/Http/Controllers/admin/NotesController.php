<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $notes = Note::all();
        return view('portal.notes.all-notes', compact('notes'));
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
        $postData = $request->except('_token', 'notes_img');
        $postData['receivals'] = json_encode($postData['receivals']);

        if($request->has('notes_img') && !empty($request->notes_img)){
            $imageName = storeImage($request, 'notes_img');
            $postData['notes_img'] = $imageName;
        }
        $result = Note::create($postData);

        if($result){
            return redirect()->route('notes.index')->with('success', 'Successfully created');
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
        $note = Note::where('id', $id)->first();

        return response()->json(['status' => true, 'data' => $note]);
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
        $postData = $request->except('_token', 'notes_img', '_method');
        $postData['receivals'] = json_encode($postData['receivals']);

        if($request->has('notes_img') && !empty($request->notes_img)){
            $imageName = storeImage($request, 'notes_img');
            $postData['notes_img'] = $imageName;
        }
        $result = Note::where('id', $id)->update($postData);

        if($result){
            return redirect()->route('note.index')->with('success', 'Successfully updated');
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
        $result = Note::where('id', $id)->delete();

        if($result){
            return redirect()->route('note.index')->with('success', 'Successfully deleted');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
