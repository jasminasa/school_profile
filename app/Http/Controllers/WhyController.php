<?php

namespace App\Http\Controllers;

use App\Models\Why;
use Illuminate\Http\Request;

class WhyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $why = Why::latest()->paginate(5);

        return view('admin.why.index', compact('why'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Why  $why
     * @return \Illuminate\Http\Response
     */
    public function edit(Why $why)
    {
        $why = Why::all();
        return view('admin.why.edit', compact('why'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Why  $why
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Why $why)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'year' => 'required',
            'student' => 'required',
            'successstudent' => 'required',
            'educator' => 'required'

        ];

        $validated = $request->validate($rules);

        $why->update($validated);

        return redirect()->route('why.index')
            ->with('success', 'Update Success!');
    }
}