<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use App\Post;
use App\Forum;
use App\Projects;
use Auth;
use Illuminate\Support\Facades\View;




class SearchController extends Controller
{
    public function Search(Request $request)
    {



/*
//ElasticSearch

        if($request->has('search')){
    		$users_result= User::search($request->input('search'))->toArray();
    	}
        echo $users_result;
        return view('nodata',compact('items'));
        */


//NOrmal Search

     $users_result = User::where('name', 'LIKE', '%'. Input::get('search') .'%')
        ->get();

      $post_result = Post::where('title', 'LIKE', '%'. Input::get('search') .'%')
        ->get();

     $project_result = Projects::where('title', 'LIKE', '%'. Input::get('search') .'%')
        ->get();

     $forum_result = Forum::where('title', 'LIKE', '%'. Input::get('search') .'%')
        ->get();


        //echo $users_result;
        //  echo $users_result->count();
        if($users_result->count())
        {
             $user_id = User::where('name', 'LIKE', '%'. Input::get('search') .'%')
        ->value('id');
          $profile = DB::table('profile')->get();

        $project = DB::table('projects')->where('user_id','=',$user_id)->distinct('title')->get(); 
        $projectcount = DB::table('projects')->where('user_id','=',$user_id)->count(); 

        $post = DB::table('posts')->where('user_id','=',$user_id)->distinct('title')->get(); 
         $postcount = DB::table('posts')->where('user_id','=',$user_id)->count(); 
         
           return view('search.profile',['profile'=>$profile,'users'=>$users_result,'project'=>$project,'post'=>$post,'projectcount'=>$projectcount,'postcount'=>$postcount]);
        }

        elseif($post_result->count())
        {
        $post_slug= Post::where('title', 'LIKE', '%'. Input::get('search') .'%')
        ->value('slug');
      $currentuser = Auth::user();
      $posts = DB::table('posts')->where('slug','=',$post_slug)->get();
       $postcomment = DB::table('postcomment')->get();
       $users = DB::table('users')->get();
       return view('search.post',['users' => $users ,'posts' => $posts,'postcomment' => $postcomment,'currentuser'=>$currentuser]);
        }

         elseif($project_result->count())
        {
        $project_slug= Projects::where('title', 'LIKE', '%'. Input::get('search') .'%')
        ->value('slug');
      $currentuser = Auth::user();
      $projects = DB::table('projects')->where('slug','=',$project_slug)->get();
       $projectscomment = DB::table('projectcomment')->get();
       $users = DB::table('users')->get();
       return view('search.project',['users' => $users ,'projects' => $projects,'projectscomment' => $projectscomment,'currentuser'=>$currentuser]);
        }

         elseif($forum_result->count())
        {
        $forum_slug= Forum::where('title', 'LIKE', '%'. Input::get('search') .'%')
        ->value('slug');
      $currentuser = Auth::user();
      $question = DB::table('forum_question')->where('slug','=',$forum_slug)->get();
       $answer = DB::table('forum_answer')->get();
       $users = DB::table('users')->get();
       return view('search.forum',['users' => $users ,'question' => $question,'answer' => $answer,'currentuser'=>$currentuser]);
        }
        else{
            return redirect()->route('home')->with('error','No data Found');
        }



    
    }
}