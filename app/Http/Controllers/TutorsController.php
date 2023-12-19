<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Testimonial;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Major;
use App\Models\Why;
use App\Models\Metadata;

use Illuminate\Http\Request;

class TutorsController extends Controller
{
    public function index()
    {
        $tutor = Tutor::all();
        $major = Major::all();
        $why = Why::all();
        $metadata = metadata::all();
        $config = Config::all();
        $testimonial = Testimonial::latest()->limit(2)->get();;
        $contact = Contact::all();
        $majorsss = Major::all();

        return view('home.tutor', compact('tutor', 'why', 'majorsss', 'major', 'testimonial', 'config', 'contact'));
    }
    public function show(Tutor $tutor)
    {
        $contact = Contact::all();
        $config = Config::all();
        $major = Major::all();
        $majorsss = Major::all();
        $metadata = Metadata::all();
        return view('home.showtutor', compact('tutor', 'metadata', 'majorsss', 'major', 'config', 'contact'));
    }
}