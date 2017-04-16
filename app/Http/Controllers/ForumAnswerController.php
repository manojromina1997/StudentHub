<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use App\ForumAnswer;
use App\ForumQuestion;
use Image;
use Auth;

class ForumAnswerController extends Controller
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
        ForumAnswer::create ([
      'user_id'=> $request->input('user_id'),
      'forum_question_id'=> $request->input('forum_question_id'),  
       'answer' => $request->input('answer'),
    
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
         $items = ForumAnswer::find($id);
         $user = Auth::user();
         $forumanswer = DB::table('forum_answer')->get();
        return view('forums.editanswer',['forumanswer'=>$forumanswer,'user'=>$user,'items'=>$items]);
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
         $answer = ForumAnswer::find($id);
        

       $answer->user_id = $request->user_id;
        $answer->forum_question_id= $request->forum_question_id;
        $answer->answer = $request->answer;
       
        $answer->update();


       $question = ForumQuestion::whereId($request->forum_question_id)->first();
    

       return redirect('question='.$question->slug)->with('success','Commented Successfully');
    
      
       //return redirect()->route('forums.index')->with('success','Answer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ForumAnswer::find($id)->delete();
        return redirect()->back()
                        ->with('success','Question deleted successfully');
    }
}
