<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Major;
use App\Models\Metadata;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $event = Event::all();
        $major = Major::all();
        $config = Config::all();
        $contact = Contact::all();
        $majorsss = Major::all();
        $metadata = Metadata::all();

        return view('home.event', compact('event', 'majorsss', 'major', 'config', 'contact', 'metadata'));
    }
    public function show(Event $event)
    {
        $contact = Contact::all();
        $config = Config::all();
        $major = Major::all();
        $metadata = Metadata::all();
        $majorsss = Major::all();
        return view('home.showevent', compact('event', 'metadata', 'majorsss', 'major', 'config', 'contact'));
    }
}
