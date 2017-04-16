<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use App\Projects;
use Image;
use Auth;

class ProjectsController extends Controller
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
         return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Projects;

        $project->user_id = $request->user_id;
        $project->title = $request->title;
        $project->tags = $request->tags;
        $project->description = $request->description;
         $title = $request->title;
        $project->slug =  $this->slugCreator($title);
        $project->sharelink = $request->sharelink;

        $project->save();
        return redirect()->route('projects.index')->with('success','Projects added  successfully');
    }

 public function slugCreator($title)
    {
         $tableTitle = Projects::where('title', $title)->first();
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
        $projects = DB::table('projects')->where('slug','=',$slug)->get();
       $projectscomment = DB::table('projectcomment')->get();
       $users = DB::table('users')->get();
       return view('projects.show',['users' => $users ,'projects' => $projects,'projectscomment' => $projectscomment,'currentuser'=>$currentuser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $items = Projects::find($id);
         $user = Auth::user();
         $projects = DB::table('projects')->get();
        return view('projects.edit',['project'=>$projects,'user'=>$user,'items'=>$items]);
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
        $project = Projects::find($id);
        $project->user_id = $request->user_id;
        $project->title = $request->title;
        $project->tags = $request->tags;
        $project->description = $request->description;
        $title = $request->title;
        $project->slug = $this->slugCreator($title);
        $project->sharelink = $request->sharelink;


        $project->update();

        return redirect()->route('projects.index')->with('success','Post edited  successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       Projects::find($id)->delete();
        return redirect()->route('projects.index')
                        ->with('success','Project Deleted successfully');
    }
}
