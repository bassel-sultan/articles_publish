<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests\Auth\Posts\CreateReqest;
use App\Http\Requests\Auth\Posts\UpdateReqest;
use App\Models\gallery;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('auth.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::all();
        $tags=Tag::all();
        return view('auth.posts.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReqest $request){

try{
    DB::beginTransaction();
    if($file=$request->file('file')){

       $fileName= $this->uploadFile($file);
       $gallery= $this->storeImage($fileName);

    }


    $post= Post::create([
        'gallery_id'=>$gallery->id,
        'user_id'=>auth()->id(),
        'title'=>$request->title,
        'description'=>$request->description,
        'status'=>$request->status,
        'category_id'=>$request->category,

        ]);

       foreach ($request->tags as $tag) {
        $post->tags()->attach($tag);
       }

    DB::commit();
    $request->session()->flash('alert-success','Post Created Successfully');
    return to_route('posts.index');

}catch(\Exception $ex){

    DB::rollback();
    return back()->withErrors($ex->getMessage());
}



    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('auth.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories=category::all();

        $tags=Tag::all();
        return view('auth.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReqest $request, Post $post)
    {

        if($file=$request->file('file')){

            $imageName=null;
            if($post->gallery){
                $imageName=$post->gallery->image;
                $imagePath=public_path('storage/auth/posts/');
                if(file_exists($imagePath.$imageName)){
                    unlink($imagePath.$imageName);
                }
            }




            $fileName=$this->uploadFile($file);
                $post->gallery->update([

                    'image'=>$fileName
                ]);
                $post->update([

                    'user_id'=>auth()->id(),
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'status'=>$request->status,
                    'category_id'=>$request->category,

                    ]);



        }


           foreach ($request->tags as $tag) {
            $post->tags()->attach($tag);
           }
           $request->session()->flash('alert-success','Post Updated Successfully');
    return to_route('posts.index');

    }

    private function uploadFile($file){
        $fileName=rand(100,1000). time(). $file->getClientOriginalName();
        $filePath=public_path('/storage/auth/posts/');
        $file->move($filePath,$fileName);
        $gallery=$this->storeImage($fileName);
        return $fileName;
    }

    private function storeImage($fileName){
        $gallery=gallery::create([

            'image'=>$fileName,

            'type'=>gallery::POST_IMAGE

        ]);
        return $gallery;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post=Post::find($id);
        if(!$post){
            abort(403);
        }
        if(($post->tags())!=null)
        $post->tags()->detach();
        $post->delete();
        $request->session()->flash('alert-success','Post Deleted Successfully');
        return to_route('posts.index');
    }
}
