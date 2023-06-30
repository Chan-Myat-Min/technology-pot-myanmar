<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {


        return view('blogs', [
            'blogs' => Blog::latest()->filter(request(['search', 'category', 'author']))->paginate()  // 15 simplepaginate()
            //'categories' => Category::all()
        ]);
    }
    // public function getBlogs()
    // {
    //     $blogs = Blog::latest();
    //     //conditional query
    //     if ($search = request('search')) {
    //         $blogs->where('title', 'LIKE', '%' . $search . '%');
    //     }
    //     return $blogs->get();
    // }
}
                                                                                                                                                                                     