<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutor = Tutor::latest()->paginate(500);

        return view('admin.tutor.index', compact('tutor'))
            ->with('i', (request()->input('page', 1) - 1) * 500);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'Department' => 'required',
            'description' => 'required',
            'image' => 'image|file|required',
        ]);

        $image = $request->file('image')->store('post-images/tutor');

        $validated['image'] = $image;

        Tutor::create($validated);

        return redirect()->route('tutor.index')
            ->with('success', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutor)
    {
        return view('admin.tutor.edit', compact('tutor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor)
    {
        $rules = [
            'name' => 'required',
            'Department' => 'required',
            'description' => 'required',
            'image' => 'image|file',
        ];

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('post-images/tutor');
        };

        $tutor->update($validated);

        return redirect()->route('tutor.index')
            ->with('success', 'Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor)
    {
        if ($tutor->image) {
            Storage::delete($tutor->image);
        }

        $tutor->delete($tutor->id);

        return redirect()->route('tutor.index')
            ->with('success', 'Delete Success!');
    }

    // public function deleteCheckedTutor(Request $request)
    // {
    //     $ids = $request->ids;
    //     Tutor::whereIn('id', $ids)->delete();
    //     return response()->json(['success' => "Delete Success!"]);
    // }
}