<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs=Post::where('status', Post::PUBLISHED)->paginate(10);
        return view('site.index',compact('blogs'));
    }

    public function openSingleBlog($id){
        $blog=Post::find($id);

        if (!$blog) {
            abort(404);
        }
        $comments=comment::where('post_id', $blog->id)->get();
        $latestPosts=Post::latest()->get();
        $tags=$blog->tags;
     return view('site.single',compact('blog','comments','latestPosts','tags'));

    }
}
