<?php

namespace App\Http\Controllers;

use App\Models\Metadata;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class MetadataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metadata = Metadata::latest()->paginate(5);

        return view('admin.metadata.index', compact('metadata'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Metadata  $metadata
     * @return \Illuminate\Http\Response
     */
    public function edit(Metadata $metadata)
    {
        $metadata = Metadata::all();
        return view('admin.metadata.edit', compact('metadata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Metadata  $metadata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metadata $metadata)
    {
        $rules = [
            'metakeyword' => 'required',
            'metasearch' => 'required',
            'metadesc' => 'required',
            'metaauthor' => 'required',
            'metawebsite' => 'required',
        ];

        $validated = $request->validate($rules);

        $metadata->update($validated);
        return redirect()->route('metadata.index')
            ->with('success', 'Data berhasil di update');
    }
}