<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/post/{post?}', function ($post) {
    $post = Post::findOrFail($post);
    return view('post.postPage',[
        'post'=> $post
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/categories', function () {
    $categories = Category::all();
    return view('categories.index',[
        'categories'=> $categories
    ]);
});
Route::get('/category/{id?}', function ($id) {
    $category = Category::find($id);
    return view('categories.categoriePosts',[
        'posts'=>$category->Posts
    ]);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get("/posts", function(){
    $posts = Post::latest()->with('author','category')->get();
    return view("post.posts",[
        "posts"=> $posts,
    ]);
});
Route::get("/users", function(){
    $posts = User::all();
    return view("users.index",[
        "posts"=> $posts,
    ]);
});


Route::get("/users/{author:username}", function(User $author){
    return view("users.userPosts",[
        "posts"=> $author->Posts,
    ]);
});

require __DIR__.'/auth.php';