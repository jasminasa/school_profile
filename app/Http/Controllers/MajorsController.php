<?php

namespace App\Http\Controllers;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Major;
use App\Models\Why;
Use App\Models\Blog;
Use App\Models\Metadata;
Use App\Models\event;

use Illuminate\Http\Request;

class MajorsController extends Controller
{
    public function index(Request $request)
    {
        $major = Major::latest()->paginate(4);
        $config = Config::all();
        $contact = Contact::all();
        $why = Why::all();
        $metadata = Metadata::all();
        $blog = Blog::latest()->limit(2)->get(); 
        $event = Event::all();
        $majorsss = Major::all();

        $major = Major::when($request->search, function ($query) use ($request) {
            $query->where('title', 'like', "%{$request->search}%");;
        })->orderBy('created_at', 'desc')->paginate(6);

        $major->appends($request->only('search'));


        return view('home.major', compact( 'major', 'metadata', 'majorsss',  'event', 'blog', 'why', 'config', 'contact'))->with('i', (request()->input('page', 1) - 1) * 4);
    }
    public function show( $id)
    {
        $major1 = Major::all();
        $contact = Contact::all();
        $config = Config::all();
        $major = Major::find($id);
        $majorsss = Major::all();
        $metadata = Metadata::all();
        return view('home.showmajor', compact('major', 'major1', 'config', 'majorsss','metadata','contact'));
    }
}
