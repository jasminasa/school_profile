<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Major;
use App\Models\Tutor;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $gallery = Gallery::count();
        $testimonial = Testimonial::count();
        $blog = Blog::count();
        $event = Event::count();
        $major = Major::count();
        $tutor = Tutor::count();
        $visit_t = Visitor::count();
        $visit_d = Visitor::where('visit_date', date('Y-m-d'))->count();
        $visit_u = Visitor::distinct()->get('ip_address')->count();

        return view('admin.dashboard', compact('gallery', 'event', 'major', 'tutor', 'testimonial', 'blog', 'visit_t', 'visit_d', 'visit_u'));
    }
}
