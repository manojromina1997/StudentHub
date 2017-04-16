<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use Image;
use Auth;
use App\Post;
use App\Http\Requests;
use App\PostComment;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $currentuser = Auth::user();
         $projects = DB::table('projects')->get();
         $users = DB::table('users')->get();
         $posts = DB::table('posts')->orderby('id','desc')->get();       
         return view('posts.index',['project' => $projects,'users' => $users ,'posts' => $posts,'currentuser'=>$currentuser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         PostComment::create ([
      'user_id'=> $request->input('user_id'),
      'post_id'=> $request->input('post_id'),  
       'comment' => $request->input('comment'),
    
      ]);


      
      // return redirect()->url('blog='.$post->slug)->with('success','Commented Successfully');
       return redirect()->back()->with('success','Commented Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $items = PostComment::find($id);
         $user = Auth::user();
         $postcomment = DB::table('postcomment')->get();
        return view('posts.editcomment',['postcomment'=>$postcomment,'user'=>$user,'items'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $comment = PostComment::find($id);
        

       $comment ->user_id = $request->user_id;
        $comment ->post_id= $request->post_id;
        $comment ->comment= $request->comment;
       
        $comment ->update();

    
      $post = Post::whereId($request->post_id)->first();
       //return redirect()->back()->with('success','Answer updated successfully');

       return redirect('blog='.$post->slug)->with('success','Commented Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          PostComment::find($id)->delete();
        return redirect()->back()
                        ->with('success','Question deleted successfully');
    }
}
