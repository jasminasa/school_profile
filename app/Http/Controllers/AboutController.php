<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::latest()->paginate(5);

        return view('admin.about.index', compact('about'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $about = About::all();
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $rules = [
            'title' => 'required',
            'image' => 'file',
            'content' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'description' => 'required',
            'history' => 'required'
        ];

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('post-images/about');
        };

        $about->update($validated);
        return redirect()->route('about.index')
            ->with('success', 'Data berhasil di update');
    }
}