<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use Image;
use Auth;
use App\Post;
use App\User;


class PostController extends Controller
{
     use Notifiable;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         $post = new Post;

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->tags = $request->tags;
        $post->content = $request->content;
        //$post->slug = str_slug($request->title, '-');
        $title = $request->title;
         $post->slug =$this->slugCreator($title) ;

        $post->save();

      

       
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully');
  

       //$users = DB::table('users')->orderby('id','desc')->first();  
       $posts = DB::table('posts')->orderby('id','desc')->first();  
      Notification::send(User::all(), new NewPost($posts));
   
       // $users->notify(new NewPost($posts));
    }

    public function slugCreator($title)
    {
         $tableTitle = Post::where('title', $title)->first();
         if($tableTitle)
         {
             $random = rand(1,100);
             $slug = str_slug($title, '-');
             $newslug =sprintf("%s%s", $slug, $random); 
             return $newslug;

         }
         else
         {
             $slug = str_slug($title, '-');
             return $slug;
         }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
          $currentuser = Auth::user();
        $posts = DB::table('posts')->where('slug','=',$slug)->get();
       $postcomment = DB::table('postcomment')->get();
       $users = DB::table('users')->get();
       return view('posts.show',['users' => $users ,'posts' => $posts,'postcomment' => $postcomment,'currentuser'=>$currentuser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $items = Post::find($id);
         $user = Auth::user();
         $posts = DB::table('posts')->get();
        return view('posts.edit',['post'=>$posts,'user'=>$user,'items'=>$items]);
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
        

        //dd($request->all());
        
           $post = Post::find($id);
        

       $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->tags = $request->tags;
        $post->content = $request->content;
       // $post->slug = str_slug($request->title, '-');
           $title = $request->title;
         $post->slug =$this->slugCreator($title) ;


        $post->update();
     
        return redirect()->route('posts.index')
                        ->with('success','Post Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Post::find($id)->delete();
        return redirect()->route('posts.index')
                        ->with('success','Item deleted successfully');
    }
}
