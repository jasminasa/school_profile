<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::latest()->paginate(500);

        return view('admin.slider.index', compact('slider'))
            ->with('i', (request()->input('page', 1) - 1) * 500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->file('image')->store('post-images');

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|file|required',
        ]);

        $image = $request->file('image')->store('post-images/slider');

        $validated['image'] = $image;

        Slider::create($validated);

        return redirect()->route('slider.index')
            ->with('success', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
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
            $validated['image'] = $request->file('image')->store('post-images/slider');
        };

        $slider->update($validated);

        return redirect()->route('slider.index')
            ->with('success', 'Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::delete($slider->image);
        }

        $slider->delete($slider->id);

        return redirect()->route('slider.index')
            ->with('success', 'Delete Success!');
    }

    // public function deleteCheckedSlider(Request $request)
    // {
    //     $ids = $request->ids;
    //     Slider::whereIn('id', $ids)->delete();
    //     return response()->json(['success' => "Delete Success!"]);
    // }
}