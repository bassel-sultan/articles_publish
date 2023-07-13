<?php
namespace app\Http\Controllers\Auth;

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\TagController;
use App\Http\Controllers\Auth\ProfileController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\CommentController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', function () {
    auth()->logout();
   // return view('welcome');
})->name('logout');
// Route::view('/theme', 'auth.dashboard');
Auth::routes([
  // 'register'=>false
]);

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', [DashboardController::class,'dashboard'])->name('dashboard');

Route::resource('auth/posts',PostController::class);
Route::get('auth/categories', [CategoryController::class,'openCategoriesPage'])->name('auth.categories');
Route::get('auth/tags', [TagController::class,'openTagsPage'])->name('auth.tags');
//Route::view('/', 'site.index');
Route::get('auth/profile',[ProfileController::class,'openProfilePage'])->name('auth.profile.index');
Route::post('auth/profile',[ProfileController::class,'storeProfilePage'])->name('auth.profile.store');

});

Route::get('/',[BlogController::class,'index'])->name('home');
Route::get('single-blog/{id}',[BlogController::class,'openSingleBlog'])->name('single-blog');
Route::post('post/comment/{postId}',[CommentController::class,'postComment'])->name('post.comment')->middleware('auth');
Route::post('comment/reply/{commentId}',[CommentController::class,'postCommentReply'])->name('comment.reply');
Route::delete('comment/reply',[CommentController::class,'deleteCommentReply'])->name('comment.reply.delete');
