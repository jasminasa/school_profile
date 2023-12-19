<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Major;
use App\Models\Why;
use App\Models\About;
use App\Models\Metadata;

use Illuminate\Http\Request;

class AboutsController extends Controller
{
    public function index()
    {
        $about = About::all();
        $major = Major::all();
        $why = Why::all();
        $config = Config::all();
        $testimonial = Testimonial::all();
        $contact = Contact::all();
        $metadata = Metadata::all();
        $majorsss = Major::all();

        return view('home.about', compact('about', 'metadata','majorsss', 'why', 'major', 'testimonial', 'config', 'contact'));
    }
}

