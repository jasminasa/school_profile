<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::latest()->paginate(500);

        return view('admin.testimonial.index', compact('testimonial'))
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
            'agency' => 'required',
            'content' => 'required',
            'image' => 'image|file|required',
        ]);

        $image = $request->file('image')->store('post-images/testimonial');

        $validated['image'] = $image;

        Testimonial::create($validated);

        return redirect()->route('testimonial.index')
            ->with('success', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $rules = [
            'name' => 'required',
            'agency' => 'required',
            'content' => 'required',
            'image' => 'image|file',
        ];

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('post-images/testimonial');
        };

        $testimonial->update($validated);

        return redirect()->route('testimonial.index')
            ->with('success', 'Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::delete($testimonial->image);
        }

        $testimonial->delete($testimonial->id);

        return redirect()->route('testimonial.index')
            ->with('success', 'Delete Success!');
    }

    // public function deleteCheckedTestimonial(Request $request)
    // {
    //     $ids = $request->ids;
    //     Testimonial::whereIn('id', $ids)->delete();
    //     return response()->json(['success' => "Delete Success!"]);
    // }
}