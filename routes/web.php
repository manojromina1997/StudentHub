<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});


//Login Page
Route::get('/login', [ 'as'=>'login', 'uses'=>'Connector@Login']);


//Register Page
Route::get('/register', [ 'as'=>'register', 'uses'=>'Connector@Register']);

//Route::get('/home', 'HomeController@index');

Auth::routes();

Auth::routes();

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');


//About Page
Route::get('/about', [ 'as'=>'aboutus', 'uses'=>'Connector@AboutUs']);


//contact us Page
Route::get('/contactus', [ 'as'=>'contactus', 'uses'=>'Connector@ContactUs']);


//home page
Route::get('/', [ 'as'=>'home', 'uses'=>'Connector@Index']);
//Home Page

Route::get('/home', [ 'as'=>'home', 'uses'=>'Connector@Index']);


//Autheticating user for first signin before handling anything.
Route::group( ['middleware' => 'auth' ,], function()
{

Route::group(['middleware' => 'prevent-back-history'],function(){




//contact us Page
Route::get('/chat', [ 'as'=>'chat', 'uses'=>'Connector@Chat']);


//Blog Page
Route::get('/blogs', [ 'as'=>'blogs', 'uses'=>'BlogController@index']);

//Users Page
Route::get('/users', [ 'as'=>'users', 'uses'=>'ProfileController@displayUsers']);

//Projects Page
//Route::get('/projects', [ 'as'=>'projects', 'uses'=>'ProjectController@index']);

//Forum Page
Route::get('/forum', [ 'as'=>'forum', 'uses'=>'ForumController@index']);






//Contact
Route::get('/contact', [ 'as'=>'contact', 'uses'=>'ContactController@getContact']);
Route::post('/contact', [ 'uses'=>'ContactController@postContact']);





//Profile of Others
Route::get('profile={id}',['as'=>'id' , 'uses'=>'ProfileController@getUser']);


//Search
Route::post('/search', [ 'as'=>'search','uses'=>'SearchController@Search']);

  //Post
Route::resource('posts', 'PostController');

  //Post Comments
Route::resource('postscomments', 'PostCommentController');


//Blog Display
Route::get('blog={slug}',['as'=>'blogsingle' , 'uses'=>'PostController@show']);

 //Project
Route::resource('projects', 'ProjectsController');

//Project Display
Route::get('project={slug}',['as'=>'projectsingle' , 'uses'=>'ProjectsController@show']);

//Post Comments
Route::resource('projectscomment', 'ProjectCommentController');
     
//Forum
Route::resource('forums', 'ForumQuestionController');

//Single Page Displaying
Route::get('question={slug}',['as'=>'questioningle' , 'uses'=>'ForumQuestionController@show']);


//Forum
Route::resource('forumsanswer', 'ForumAnswerController');



//Single Page Displaying
Route::get('question={slug}',['as'=>'questioningle' , 'uses'=>'ForumQuestionController@show']);

  //Profiledetail
Route::resource('profiledetail', 'ProfileDetailController');

     //After Register
     Route::get('/registerupdateprofile', [ 'as'=>'registerupdateprofile', 'uses'=>'ProfileController@RegisterUpdateProfile']);

     //Profile Update
Route::get('/profileupdate', [ 'as'=>'profileupdate', 'uses'=>'ProfileController@getProfile']);
Route::post('/profileupdate', [ 'uses'=>'ProfileController@postProfile']);

  //Profile
  Route::get('/profile', [ 'as'=>'profile', 'uses'=>'Connector@Profile']);

//Update Profile Photo
  Route::get('/updateprofilephoto', [ 'as'=>'updateprofilephoto', 'uses'=>'ProfileController@getUpdateProfilePhoto']); 
    Route::post('/updateprofilephoto', [ 'uses'=>'ProfileController@postUpdateProfilePhoto']);

    //Edit Profile
      Route::get('/editprofile', [ 'as'=>'editprofile', 'uses'=>'ProfileController@getEditProfile']);
      Route::post('/editprofile', [  'uses'=>'ProfileController@postEditProfile']);

      //Update Profile
      Route::get('/updateprofile', [ 'as'=>'updateprofile', 'uses'=>'Connector@UpdateProfile']);

      
      //Blog Related routes
 //Route::resource('post','BlogController'); 

   //Blog add New Post
  // Route::get('/addpost', [ 'as'=>'addpost', 'uses'=>'BlogController@create']);

     //Blog add New Project
   Route::get('/addproject', [ 'as'=>'addproject', 'uses'=>'ProjectController@create']);





   //post comment

Route::get('/newpostcomment', [ 'as'=>'newpostcomment', 'uses'=>'BlogController@getPostComment']);
Route::post('/newpostcomment', [ 'uses'=>'BlogController@postPostComment']);

  //post comment

Route::get('/newprojectcomment', [ 'as'=>'newprojectcomment', 'uses'=>'ProjectController@getProjectComment']);
Route::post('/newprojectcomment', [ 'uses'=>'ProjectController@postProjectComment']);

//Add post
  // Route::get('/addpost', [ 'as'=>'addpost', 'uses'=>'BlogController@create']);

   //Add Project
Route::get('/addproject', [ 'as'=>'addproject', 'uses'=>'ProjectController@create']);


//New Post
//Route::get('/newpost', [ 'as'=>'newpost', 'uses'=>'BlogController@index']);
//Route::post('/newpost', [ 'uses'=>'BlogController@store']);

//Update Post
//Route::get('/updatepost', [ 'as'=>'updatepost', 'uses'=>'BlogController@edit']);
//Route::post('/updatepost', [ 'uses'=>'BlogController@update']);

//New Post
Route::get('/newproject', [ 'as'=>'newproject', 'uses'=>'ProjectController@index']);
Route::post('/newproject', [ 'uses'=>'ProjectController@store']);

//add question
Route::get('/addquestion', [ 'as'=>'addquestion', 'uses'=>'ForumController@create']);
Route::get('/newanswer', [ 'as'=>'newanswer', 'uses'=>'ForumController@getForumComment']);
Route::post('/newanswer', [ 'uses'=>'ForumController@postForumComment']);

//Forum Related 
Route::get('/newquestion', [ 'as'=>'newquestion', 'uses'=>'ForumController@create']);
Route::post('/newquestion', [ 'uses'=>'ForumController@store']);


});

});