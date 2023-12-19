<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Major;
use App\Models\Why;
use App\Models\Metadata;

use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        $major = Major::all();
        $why = Why::all();
        $metadata = Metadata::all();
        $config = Config::all();
        $testimonial = Testimonial::latest()->limit(2)->get();
        $contact = Contact::all();
        $majorsss = Major::all();

        return view('home.gallery', compact('gallery', 'metadata', 'why', 'major', 'majorsss', 'testimonial', 'config', 'contact'));
    }
}