@extends('layouts.master')
@section('title')
StudentHub - Search
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








<div class="panel panel-default"><!--Panel Default -->

<div class="panel-heading">
     <div class="post">
          <h2 style="text-align:center">Users ({{$usercount}})</h2>
     </div>
</div>
 	<div class="about" style="margin=top:10px;"><!--About-->
		<div class="container"><!--Container-->
			<div class="about-main"><!--About Main-->
				<div class="col-md-10 about-left"><!--Column-->		

              	@foreach($users_result as $user)
                    <!--Post -->	
		
                     <div class="row"><!--Row Inner -->
                          <div class="col-md-11 "><!--Column Inner-->
                               <div class="panel panel-default"><!--Panel Default-->
			                        <!--Post Heading Starts-->
			                       <div class="panel-heading">
	                                       <a href="{{url('profile='.$user->id)}}" style="text-decoration:none">	
			                                   <div style="padding-top:10px">
			                                   <img src="/uploads/avatars/{{$user->avatar}}" style="width:10% ; height:10% ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>

				                               </div>	
                                          </a>
                                   </div><!--Post Heading Ends -->
							</div>
                            </div>
                            </div>
  @endforeach
           <!--Post -->
							<div class="clearfix"></div>
				</div><!--Column-->
				</div><!--About Main-->
				</div><!--Container-->
				</div><!--About-->
              

<div class="panel-heading">
     <div class="post">
          <h2 style="text-align:center"> Post({{$postcount}})</h2>
     </div>
</div>
 	<div class="about" style="margin=top:10px;"><!--About-->
		<div class="container"><!--Container-->
			<div class="about-main"><!--About Main-->
				<div class="col-md-10 about-left"><!--Column-->		

              	@foreach($post_result as $post)
                    <!--Post -->	
		
                     <div class="row"><!--Row Inner -->
                          <div class="col-md-11 "><!--Column Inner-->
                               <div class="panel panel-default"><!--Panel Default-->
			                        <!--Post Heading Starts-->
			                       <div class="panel-heading">

	                                <a href="{{url('blog='.$post->slug)}} " style="text-decoration:none">
			                       <!--Post Body-->
			                       <div style="text-align:center;">
			                            <h3>{{$post->title}}</h3>
			                        </div>
                                
                                   
                     </a>	
                                   </div><!--Post Heading Ends -->
							</div>
                            </div>
                            </div>
  @endforeach
           <!--Post -->
							<div class="clearfix"></div>
				</div><!--Column-->
				</div><!--About Main-->
				</div><!--Container-->
				</div><!--About-->
<div class="panel-heading">
     <div class="post">
          <h2 style="text-align:center">Project ({{$projectcount}})</h2>
     </div>
</div>
 	<div class="about" style="margin=top:10px;"><!--About-->
		<div class="container"><!--Container-->
			<div class="about-main"><!--About Main-->
				<div class="col-md-10 about-left"><!--Column-->		

              	@foreach($project_result as $projects)
                    <!--Post -->	
		
                     <div class="row"><!--Row Inner -->
                          <div class="col-md-11 "><!--Column Inner-->
                               <div class="panel panel-default"><!--Panel Default-->
			                        <!--Post Heading Starts-->
			                       <div class="panel-heading">
	                                       <a href="{{url('project='.$projects->slug)}} " style="text-decoration:none">
			                                   <!--Post Body-->
			                                   <div style="text-align:center;">
			                                        <h3>{{$projects->title}}</h3>
			                                   </div>
			                                   	<!--Post Body-->
												   </a>
                                   </div><!--Post Heading Ends -->
							</div>
                            </div>
                            </div>
  @endforeach
           <!--Post -->
							<div class="clearfix"></div>
				</div><!--Column-->
				</div><!--About Main-->
				</div><!--Container-->
				</div><!--About-->
<div class="panel-heading">
     <div class="post">
          <h2 style="text-align:center">Forum({{$forumcount}})</h2>
     </div>
</div>
 	<div class="about" style="margin=top:10px;"><!--About-->
		<div class="container"><!--Container-->
			<div class="about-main"><!--About Main-->
				<div class="col-md-10 about-left"><!--Column-->		

              	@foreach($forum_result as $forumquestion)
                    <!--Post -->	
		
                     <div class="row"><!--Row Inner -->
                          <div class="col-md-11 "><!--Column Inner-->
                               <div class="panel panel-default"><!--Panel Default-->
			                        <!--Post Heading Starts-->
			                       <div class="panel-heading">
	                                    <a href="{{url('question='.$forumquestion->slug)}} " style="text-decoration:none">
			                                        <!--Question Body Starts-->
			                                       <div style="text-align:center;">
			                                            <h3>Title - {{$forumquestion->title}}</h3>
			                                        </div>
			                                      <!--Question Body Ends-->
                                                </a>

                                   </div><!--Post Heading Ends -->
							</div>
                            </div>
                            </div>
  @endforeach
           <!--Post -->
							<div class="clearfix"></div>
				</div><!--Column-->
				</div><!--About Main-->
				</div><!--Container-->
				</div><!--About-->
</div>
<br>
<br>
<br>
<br>
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