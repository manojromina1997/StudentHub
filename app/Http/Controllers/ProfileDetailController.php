<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use  Auth;
use Image;
use Illuminate\Support\Facades\DB;

class ProfileDetailController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile');
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
        Profile::create ([
      'user_id'=> $request->input('user_id'),
      'technology'=> $request->input('technology'),
      'interest'=> $request->input('interest'),
      'about'=> $request->input('about'),  
    
      ]);
      
       return redirect()->route('profile')->with('success','Profile Updated successfully');
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
         $items = Profile::find($id);
           $user = Auth::user();
         $profile = DB::table('profile')->get();
        return view('user.editProfile',['profile'=>$profile,'user'=>$user,'items'=>$items]);
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
        $profile = Profile::find($id);
        

       $profile ->user_id = $request->user_id;
        $profile->technology= $request->technology;
      $profile ->interest= $request->interest;
      $profile ->about= $request->about;
       
        $profile ->update();

      
       return redirect()->route('profile')->with('success','Profile Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
