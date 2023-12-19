<?php

namespace App\Http\Controllers;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Major;
use App\Models\Why;
Use App\Models\Blog;
Use App\Models\Metadata;
Use App\Models\Category;

use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(Request $request){
        $blog = Blog::latest()->paginate(4);
        $config = Config::all();
        $contact = Contact::all();
        $why = Why::all();
        $metadata = Metadata::all();
        $category = Category::all();
        $majorsss = Major::all();


        $blog = Blog::when($request->search, function ($query) use ($request) {
            $query->where('title', 'like', "%{$request->search}%");;
        })->orderBy('created_at', 'desc')->paginate(6);

        $blog->appends($request->only('search'));

        return view('home.blog' , compact( 'majorsss','category','metadata', 'blog', 'why', 'config', 'contact'));
    }
    public function show( $id)
    {
        $blog1 = Blog::all();
        $contact = Contact::all();
        $config = Config::all();
        $blog = Blog::find($id);
        $majorsss = Major::all();
        $category = Category::all();
        $metadata = Metadata::all();
        return view('home.showblog', compact('blog', 'metadata', 'blog1', 'category', 'config', 'majorsss','contact'));
    }
}
