<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
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
Route::get('/post/{post?}', function (Post $post) {
    // $post = Post::findOrFail($id);
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
Route::get('/category/{category?}', function (Category $category) {
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
    $posts = Post::all();
    return view("post.posts",[
        "posts"=> $posts,
    ]);
});

require __DIR__.'/auth.php';