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

class CategoriesController extends Controller
{
    public function show($id)
    {
        $blog = Blog::latest()->paginate(4);
        $config = Config::all();
        $contact = Contact::all();
        $why = Why::all();
        $metadata= Metadata::all();
        $category = Category::find($id);
        $majorsss = Major::all();
        $categories = Category::all();
        return view('home.categories' , compact( 'majorsss','metadata','category', 'categories', 'blog', 'why', 'config', 'contact')); 
    }
}
