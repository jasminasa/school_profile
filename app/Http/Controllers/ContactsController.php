<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Contact;
use App\Models\Major;
use App\Models\Metadata;
use App\Models\Formcontact;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $config = Config::all();
        $contact = Contact::all();
        $major = Major::all();
        $metadata = Metadata::all();
        $majorsss = Major::all();

        return view('home.contacts', compact('config', 'metadata', 'majorsss', 'major', 'contact'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email'=>'required',
                'subject' => 'required',
                'massage' => 'required',
                'g-recaptcha-response' => 'required|captcha'
            ],
            [
                'g-recaptcha-response.required' => 'Please verify that you are not a robot.'
            ]
        );

        Formcontact::create($validated);

        return back()
            ->with('success', 'Add Success!');
    }
}