<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;


Route::middleware(GuestMiddleware::class)->group(function(){
    Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginStore']);
});

Route::middleware(AuthMiddleware::class)->group(function()
{
    Route::get('/', [BlogController::class, 'index']);
Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/blogs/{blog:slug}', function (Blog $blog) {
        return view('blog', [
            'blog' => $blog->load('comments'), //egger loading
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
        ]);
    })->where('blog', '[A-z\d\-_]+');
    Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);
});




Route::get('/videos/', [VideoController::class, 'index']);
Route::get('/videos/{video}', [VideoController::class, 'show']);




// Route::get('/users/{user:username}', function (User $user) {
//     // $blogs = $user->blogs->load('author', 'category');
//     $blogs = $user->blogs;
//     return view('blogs', [
//         'blogs' => $blogs
//         // 'categories' => Category::all(),

//     ]);
// });


// Route::get('/categories/{category:slug}', function (Category $category) {


//     $blogs = $category->blogs;
//     return view('blogs', [
//         'blogs' => $blogs,
//         'categories' => Category::all()
//         // 'currentCategory' => $category
//     ]);
// });



//wild card
// Route::get('/blogs/{id}', function ($id) {
//     $blog = Blog::findOrFail($id);
//     return view('blog', [
//         'blog' => $blog
//     ]);
// });

// Route::get('/blogs/{slug}', function ($slug) {
//     $blog = Blog::where('slug', '=', $slug)->first();
//     return view('blog', [
//         'blog' => $blog
//     ]);
// });




//Route::get('/blogs/1', [AboutController::class, 'hello']);


//localhost:8000/about
//Route::get('/about', [AboutController::class, 'hello']);
// Route::get('/', function () {
//     dd(request('search')){
//         dd('hit')
//     };
//     // DB::listen(function($query){
//     // logger($query->sql);
//     // });
//     // $blogs = Blog::with('category', 'author')->get();
//     $blogs = Blog::latest();
//     return view('blogs', [
//         'blogs' => $blogs->get(),
//         'categories'=>Category::all()
//     ]);
