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
use App\Http\Requests;
use App\Product;

class Connector extends Controller
{
    //Home Page
    public function Index()
    {
        $usercount =  DB::table('users')->count();
        $postcount =  DB::table('posts')->count();
        $projectcount =  DB::table('projects')->count();
        $forumcount =  DB::table('forum_question')->count();
     
         $users = DB::table('users')->get();
         $posts = DB::table('posts')->orderby('id','desc')->get();
         $forum_question = DB::table('forum_question')->orderby('id','desc')->limit(10)->get();
         $projects = DB::table('projects')->orderby('id','desc')->limit(5)->get();

        return view('index',['users' => $users ,'posts' => $posts,'questions'=> $forum_question,'projects'=>$projects,
        'usercount'=>$usercount,'postcount'=>$postcount,'projectcount'=>$projectcount,'forumcount'=>$forumcount,]);
    }

     public function Chat()
    {
        return view('chat');
    }
     public function Login()
    {
        return view('auth.login');
    }

        public function Register()
    {
        return view('auth.register');
    }
    
    
        public function Profile()
    {
        $user = Auth::user();
        $project = DB::table('projects')->where('user_id','=',Auth::user()->id)->distinct('title')->get(); 
        $projectcount = DB::table('projects')->where('user_id','=',Auth::user()->id)->count(); 

        $post = DB::table('posts')->where('user_id','=',Auth::user()->id)->distinct('title')->get(); 
         $postcount = DB::table('posts')->where('user_id','=',Auth::user()->id)->count(); 
         
         $profile = DB::table('profile')->get();
        return view('user.profile',['profile'=>$profile,'user'=>$user,'project'=>$project,'post'=>$post,'projectcount'=>$projectcount,'postcount'=>$postcount]);
    }
    
     public function RegisterUpdateProfile()
    {
        
        return view('user.registerUpdateProfile',array('user' => Auth::user()));
    }

     public function UpdateProfile()
    {
        
        $user = Auth::user();
         $profile = DB::table('profile')->get();
        return view('user.updateProfile',['profile'=>$profile,'user'=>$user]);
    }
      public function EditProfile()
    {
        
        $user = Auth::user();
         $profile = DB::table('profile')->get();
        return view('user.editProfile',['profile'=>$profile,'user'=>$user]);
    }
     public function getUpdateProfilePhoto()
    {
        
        return view('user.updateProfile',array('user' => Auth::user()));
    }

        public function postUpdateProfilePhoto(Request $request)
    {
    // Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}
         $user = Auth::user();
           $profile = DB::table('profile')->get();
    	return view('user.updateProfile', ['profile'=>$profile,'user'=>$user] );

       
    }

    
        public function Forum()
    {
         
         $forumquestion = DB::table('forum_question')->get();
         $users = DB::table('users')->get();
        return view('forums.index',['forumquestion' => $forumquestion,'users' => $users ]);
    }
        public function Projects()
    {
         $projects = DB::table('projects')->orderby('id','desc')->get();
         $users = DB::table('users')->get();
         $posts = DB::table('posts')->orderby('id','desc')->get();
        return view('projects.index',['projects' => $projects,'users' => $users ,'posts' => $posts]);
    }  
    
  
         public function AddProject()
    {
        return view('projects.add');
    }
     
        public function AddQuestion()
    {
        return view('forums.addquestion');
    }

      public function AboutUs()
    {
        return view('others.aboutus');
    }
       public function ContactUs()
    {
        return view('others.contactus');
    }
}