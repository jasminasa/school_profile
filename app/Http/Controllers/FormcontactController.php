<?php

namespace App\Http\Controllers;

use App\Models\Formcontact;
use Illuminate\Http\Request;
// use App\Models\Contact;

class FormcontactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formcontact = Formcontact::latest()->paginate(5);

        return view('admin.formcontact.index', compact('formcontact'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate(
        //     [
        //         'firstname' => 'required',
        //         'lastname' => 'required',
        //         'subject' => 'required',
        //         'content' => 'required',
        //         'g-recaptcha-response' => 'required|captcha'
        //     ],
        //     [
        //         'g-recaptcha-response.required' => 'Please verify that you are not a robot.'
        //     ]
        // );

        // Formcontact::create($validated);

        // return redirect()->route('formcontact.index')
        //     ->with('success', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formcontaact  $formcontaact
     * @return \Illuminate\Http\Response
     */
    public function show(Formcontaact $formcontaact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formcontaact  $formcontaact
     * @return \Illuminate\Http\Response
     */
    public function edit(Formcontaact $formcontaact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formcontaact  $formcontaact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formcontaact $formcontaact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formcontaact  $formcontaact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formcontact $formcontact)
    {
        $formcontact->delete($formcontact->id);

        return redirect()->route('formcontact.index')
            ->with('success', 'Delete Success!');
    }
}
