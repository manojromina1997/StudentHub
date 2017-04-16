<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use  Auth;
use Image;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
  
   //Profile Page will be  Return
   public function getProfile(Request $request)
    {
     return view('user.profile');
    }

    //Register USer Data will be Saved in Database 
        public function postProfile(Request $request)
    
      {
        Profile::create ([
      'user_id'=> $request->input('user_id'),
      'technology'=> $request->input('technology'),
      'interest'=> $request->input('interest'),
      'about'=> $request->input('about'),  
    
      ]);
      
       return redirect()->route('profile')->with('success','Profile Updated successfully');
    }


//Random User
       public function getUser($id )
    {
      $users = DB::table('users')->where('id','=',$id)->get();
     $profile = DB::table('profile')->get();

        $project = DB::table('projects')->where('user_id','=',$id)->distinct('title')->get(); 
        $projectcount = DB::table('projects')->where('user_id','=',$id)->count(); 

        $post = DB::table('posts')->where('user_id','=',$id)->distinct('title')->get(); 
         $postcount = DB::table('posts')->where('user_id','=',$id)->count(); 
         
        
        return view('user.otherprofiles',['profile'=>$profile,'users'=>$users,'project'=>$project,'post'=>$post,'projectcount'=>$projectcount,'postcount'=>$postcount]);
     
    }

//After registering this page will be redirect
     public function RegisterUpdateProfile()
    {
        
        return view('user.registerUpdateProfile',array('user' => Auth::user()));
    }
     

// It will Return Update Profile Page
      public function getUpdateProfilePhoto()
    {
        
        return view('user.updateProfile',array('user' => Auth::user()));
    }

     //Updating Profile Photo
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
    	return view('user.registerUpdateProfile', ['profile'=>$profile,'user'=>$user] );



       
    }

//Profile Update
       public function UpdateProfile()
    {
        
        $user = Auth::user();
         $profile = DB::table('profile')->get();
        return view('user.updateprofile',['profile'=>$profile,'user'=>$user]);
    }
 
     

//Profile Page will be  Return
   public function getEditProfile(Request $request)
    {
         $user = Auth::user();
         $profile = DB::table('profile')->get();
        return view('user.editProfile',['profile'=>$profile,'user'=>$user]);
    }

    //Register USer Data will be Saved in Database 
        public function postEditProfile(Request $request)
    
      {
        Profile::create ([
      'user_id'=> $request->input('user_id'),
      'technology'=> $request->input('technology'),
      'interest'=> $request->input('interest'),
      'about'=> $request->input('about'),  
    
      ]);
      
       return redirect()->route('profile')->with('success','Profile Updated successfully');
    }


}





