<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(){
        $postsCount=Post::count();
        $tagsCount=Tag::count();
        $categoriesCount=category::count();
        $usersCount=User::count();
       // dd($postsCount);
        return view('auth.dashboard' ,compact('postsCount','tagsCount','categoriesCount','usersCount')) ;
    }
}
