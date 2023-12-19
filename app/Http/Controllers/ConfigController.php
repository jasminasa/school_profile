<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::latest()->paginate(5);

        return view('admin.config.index', compact('config'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        $config = Config::all();
        return view('admin.config.edit', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        $rules = [
            'title' => 'required',
            'favicon' => 'file',
            'logo' => 'file',
            'metadata' => 'required',
            'map' => 'required',
            'fb' => 'required',
            'ig' => 'required',
            'yt' => 'required',
            'pin' => 'required',
            'twit' => 'required',
        ];

        $validated = $request->validate($rules);

        if ($request->file('favicon')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['favicon'] = $request->file('favicon')->store('post-images/config');
        };

        if ($request->file('logo')) {
            if ($request->oldFooterImage) {
                Storage::delete($request->oldFooterImage);
            }
            $validated['logo'] = $request->file('logo')->store('post-images/config');
        };

        $config->update($validated);

        return redirect()->route('config.index')
            ->with('success', 'Update Success!');
    }
}