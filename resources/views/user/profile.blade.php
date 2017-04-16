@extends('layouts.master')
@section('title')
StudentHub - Profile
@endsection
@section('content')
<br>
<br>
<br>
<!-- script-for-menu -->
<script>
$("span.menu").click(function(){
$(" ul.navig").slideToggle("slow" , function(){
});
});
</script>
<!--script-for-menu-->



<!--welcome-starts-->
<div class="welcome">
	<div class="container">
		<div class="welcome-top heading">
			<a href="{{route('updateprofile')}}"/><h3>Update Your Profile</h3></a>
		</div>
	</div>
</div>
	<!--welcome-end-->

<div class="container"><!--Container-->
<div class="row"><!--Row-->
<div class="col-md-10 col-md-offset-1"><!--Column-->
<div class="panel panel-default" style="padding-left:20px"><!--Panel Default-->
<h2>{{ Auth::user()-> name }}'s Profile</h><br>
<img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:150px ; height:150px ;float-left;border-radius:50%;margin-right:25px;"/>

<!--Profile Starts-->
@foreach($profile as $profile)		
@if($user->id == $profile->user_id)	

<div class="panel-heading">
<h3>Technologies </h3>
</div>

<div class="body" style="padding-left:20px ; font-size:15px">
{{$profile->technology}}
</div>

<div class="panel-heading">
<h3>Interest's </h3>
</div>

<div class="body"  style="padding-left:20px ; font-size:15px">
{{$profile->interest}}
</div>

<div class="panel-heading">
<h3>About</h3>
</div>

<div class="body"  style="padding-left:20px ; font-size:15px" >
{!!$profile->about!!}
</div>

@endif
@endforeach
<!--Profile Ends -->


</div><!-- Pannel Default CLose-->

<div class="panel panel-default"><!--Panel Default -->

<div class="panel-heading">
     <div class="post">
          <h2 style="text-align:center">Post({{$postcount}})</h2>
     </div>
</div>

<!--Post Started -->
@foreach($post as $post)
@if($user->id = $post->user_id)
	<!--Panel Body-->
<div class="panel-body">
     <a href="{{url('blog='.$post->slug)}} " style="text-decoration:none"><!--Blog Linking-->

	      <div class="btn-group" >
               <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="padding-right:20px">
                   Action
                  <span class="caret"></span>
               </a>
               <ul class="dropdown-menu">
               <li>Edit</li>
                <li>Delete</li> 
               </ul>
         </div>	

		 <div style="text-align:center;">
			     <h3>Title - {{$post->title}}</h3>
		 </div>
                
         <div class="panel-body">
				     {!!$post->content!!}
         </div>
	 </a><!--Blog Linking-->
            <form class="" action="{{route('posts.destroy',$post->id)}}" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="name" value="delete">
         </form>
</div>		
				
				<br>
@endif
@endforeach
<!--Post Ends-->
</div>
<!--Panel Body-->


<div class="panel panel-default">
     <div class="panel-heading">
          <div class="post">
               <h2 style="text-align:center">Project({{$projectcount}})</h2>
          </div>
    </div>

<!--Project Starts-->
    @foreach($project as $project)
    @if($user->id = $project->user_id)
	<!--PanelBody-->
	<div class="panel-body">

        <a href="{{url('project='.$project->slug)}} " style="text-decoration:none">
		  <div style="text-align:center;">
			   <h3>Title - {{$project->title}}</h3>
		  </div>
		  
          <h4>	Project Link - {{$project->sharelink}}</h4>

          <div class="panel-body">
               {!!$project->description!!}
          </div>
		</a>			
     </div>
    <!--Panel Body-->
				<br>
@endif
@endforeach
<!--Project Ends-->
</div>



</div><!--Pannel Default-->
</div><!--Colum-->
</div><!--Row-->
</div><!--Container-->

<br>
<br>

  


@endsection
<script>
$(document).ready(function(){
    $(".post").click(function(){
        $(".postshow").slideDown("slow");
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>