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
use App\Projects;
use App\Http\Requests;
use App\ProjectComment;

class ProjectCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $currentuser = Auth::user();
        $posts = DB::table('posts')->get();
         $users = DB::table('users')->get();
         $projects = DB::table('projects')->orderby('id','desc')->get();
        return view('projects.index',['project' => $projects,'users' => $users ,'posts' => $posts,'currentuser'=>$currentuser]);
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
        ProjectComment::create ([
      'user_id'=> $request->input('user_id'),
      'project_id'=> $request->input('project_id'),  
       'comment' => $request->input('comment'),
    
      ]);
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

        $items = ProjectComment::find($id);
         $user = Auth::user();
         $projects = DB::table('projects')->get();
        return view('projects.editcomment',['project'=>$projects,'user'=>$user,'items'=>$items]);
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
        $projectcomment = ProjectComment::find($id);

        $projectcomment->user_id = $request->user_id;
        $projectcomment->project_id = $request->project_id;
        $projectcomment->comment = $request->comment;
       


        $projectcomment->update();



      $project = Projects::whereId($request->project_id)->first();
       //return redirect()->back()->with('success','Answer updated successfully');

       return redirect('project='.$project->slug)->with('success','Commented Successfully');

        return redirect()->route('projectscomment.index')->with('success','Post edited  successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         ProjectComment::find($id)->delete();
        return redirect()->back()
                        ->with('success','Project Comment Deleted successfully');
    }
}
