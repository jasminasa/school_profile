<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::latest()->paginate(500);
        $category = Category::all();

        return view('admin.gallery.index', compact('gallery', 'category'))
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|file|required',
        ]);

        $image = $request->file('image')->store('post-images/gallery');

        $validated['image'] = $image;

        Gallery::create($validated);

        return redirect()->route('gallery.index')
            ->with('success', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $category = Category::all();
        return view('admin.gallery.edit', compact('gallery', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|file',
        ];

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('post-images/gallery');
        };

        $gallery->update($validated);

        return redirect()->route('gallery.index')
            ->with('success', 'Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::delete($gallery->image);
        }

        $gallery->delete($gallery->id);

        return redirect()->route('gallery.index')
            ->with('success', 'Delete Success!');
    }

    // public function deleteCheckedGallery(Request $request)
    // {
    //     $ids = $request->ids;
    //     Gallery::whereIn('id', $ids)->delete();
    //     return response()->json(['success' => "Delete Success!"]);
    // }
}