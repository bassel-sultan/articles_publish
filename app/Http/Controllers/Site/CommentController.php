<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CreateRequest;
use App\Http\Requests\Site\Reply\createRequest as ReplyCreateRequest;
use App\Models\comment;
use App\Models\Post;
use App\Models\comment_replies;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   public function postComment(CreateRequest $request,$postId){

    if(auth()->check()){
        $post=Post::find($postId);
        if(!$post){
            return back()->withErrors('Unable to find post ,pleas try again');
        }

        comment::create([
            'post_id'=>$postId,
            'user_id'=>auth()->id(),
            'comment'=>$request->comment
        ]);


        $request->session()->flash('alert-success','comment added successfully,it will be available  after admin');
    }
    return back();

   }

   public function postCommentReply(ReplyCreateRequest $request,$commentId){
    $commentId=$commentId;
    $comment=$request->comment;
    try{
        comment_replies::create([

            'comment_id'=>$commentId,
            'user_id'=>auth()->id(),
            'comment'=>$comment
        ]);
    }catch(\Exception $ex){
return back()->withErrors($ex->getMessage());
    }

    $request->session()->flash('alert-success','Comment reply added successfully');
    return back();

   }
   public function deleteCommentReply(Request $request){
    $replyId=$request->reply_id;
    $reply=comment_replies::find($replyId);
    if(!$reply){
        return back()->withErrors('Unable to locate the reply,please refresh the webpage');
    }
    $reply->delete();
    $request->session()->flash('alert-success',' Comment reply deleted successfully');
    return back();

   }
}
