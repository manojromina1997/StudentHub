<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use App\ForumQuestion;
use Image;
use Auth;

class ForumQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentuser = Auth::user();
         $forumquestion = DB::table('forum_question')->orderby('id','desc')->get();
         $users = DB::table('users')->get();
        return view('forums.index',['forumquestion' => $forumquestion,'users' => $users,'currentuser'=>$currentuser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('forums.createquestion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

       $question = new ForumQuestion;

        $question->user_id = $request->user_id;
        $question->title = $request->title;
        $question->tags = $request->tags;
        $question->content = $request->content;
         $title = $request->title;
        $question->slug =  $this->slugCreator($title);
        $question->save();

       return redirect()->route('forums.index')->with('success','Question added  successfully');
    }

     public function slugCreator($title)
    {
         $tableTitle = ForumQuestion::where('title', $title)->first();
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
        $question = DB::table('forum_question')->where('slug','=',$slug)->get();
       $answer = DB::table('forum_answer')->get();
       $users = DB::table('users')->get();
       return view('forums.single',['users' => $users ,'question' => $question,'answer' => $answer,'currentuser'=>$currentuser]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = ForumQuestion::find($id);
         $user = Auth::user();
         $forumquestion = DB::table('forum_question')->get();
        return view('forums.editquestion',['forumquestion'=>$forumquestion,'user'=>$user,'items'=>$items]);
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
          $question = ForumQuestion::find($id);
        

       $question->user_id = $request->user_id;
        $question->title = $request->title;
        $question->tags = $request->tags;
        $question->content = $request->content;
         $title = $request->title;
        $question->slug =  $this->slugCreator($title);

        $question->update();

    
      
       return redirect()->route('forums.index')->with('success','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ForumQuestion::find($id)->delete();
        return redirect()->route('forums.index')
                        ->with('success','Question deleted successfully');
    }
}
