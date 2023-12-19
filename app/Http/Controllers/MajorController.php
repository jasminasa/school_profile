<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $major = Major::latest()->paginate(500);

        return view('admin.Major.index', compact('major'))
            ->with('i', (request()->input('page', 1) - 1) * 500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.major.create');
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
            'title' => 'required',
            'desc' => 'required',
            'overview' => 'required',
            'Competention' => 'required',
            'Certification' => 'required',
            'student' => 'required',
            'successstudent' => 'required',
            'educator' => 'required',
            'image' => 'image|file|required',
        ]);

        $image = $request->file('image')->store('post-images/major');

        $validated['image'] = $image;

        Major::create($validated);

        return redirect()->route('major.index')
            ->with('success', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        return view('admin.major.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        $rules = [
            'title' => 'required',
            'desc' => 'required',
            'overview' => 'required',
            'Competention' => 'required',
            'Certification' => 'required',
            'student' => 'required',
            'successstudent' => 'required',
            'educator' => 'required',
            'image' => 'image|file',
        ];

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('post-images/major');
        };

        $major->update($validated);

        return redirect()->route('major.index')
            ->with('success', 'Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        if ($major->image) {
            Storage::delete($major->image);
        }

        $major->delete($major->id);

        return redirect()->route('major.index')
            ->with('success', 'Delete Success!');
    }
}
