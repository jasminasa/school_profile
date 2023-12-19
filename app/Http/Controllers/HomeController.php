<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\About;
use App\Models\Why;
use App\Models\Event;
use App\Models\Tutor;
use App\Models\Gallery;
use App\Models\Major;
use App\Models\Testimonial;
use App\Models\Formcontact;
use App\Models\Config;
use App\Models\Contact;
Use App\Models\Blog;
Use App\Models\Metadata;

use App\Models\Visitor;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        $metadata = Metadata::all();
        $about = About::all();
        $why = Why::all();
        $major = Major::all();
        $tutor = Tutor::all();
        $event = Event::all();
        $testimonial = Testimonial::all();
        $config = Config::all();
        $contact = Contact::all();
        $blog = Blog::latest()->limit(2)->get(); 
        $majorsss = Major::all();

        $ip_now = $_SERVER['REMOTE_ADDR'];
        // $ip_address = Visitor::where('ip_address', $ip_now);

        $validated = [
            'ip_address' => $ip_now,
            'visit_date' => date('Y-m-d'),
        ];

        Visitor::create($validated);
        
    return view('home.index',  compact('slider', 'metadata', 'majorsss', 'blog', 'event', 'tutor', 'about', 'why', 'testimonial', 'major', 'config', 'contact'));
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
