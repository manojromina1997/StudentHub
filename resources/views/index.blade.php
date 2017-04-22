@extends('layouts.master')
@section('title')
StudentHub - Home
@endsection
@section('content')

<!-- script-for-menu -->
<script>
$("span.menu").click(function(){
$(" ul.navig").slideToggle("slow" , function(){
});
});
</script>
<!--script-for-menu-->

<!--banner-starts-->
<div class="content">
	<div class="banner">
		<div class="container">
			<div class="banner-top">
				<div class="banner-text">
					<h2>StudentHub</h2>
					<h1>Learn,Build,Share</h1>

					<div class="banner-btn">
						<a href="{{route('aboutus')}}">Read More</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!--banner-end-->

<!--about-starts-->
<div class="about" style="margin=top:10px;">

    <!--Container Start -->
    <div class="container">

        <!--About Main Start -->
        <div class="about-main">

            <!--About Left Start -->
            <div class="col-md-8 about-left">

                <!--Post Starts -->			
                  @foreach($posts as $post)

                 <!--User Information Starts -->			
                  @foreach($users as $user)
                  @if($post->user_id == $user->id)

                  <!-- Row Start -->
                   <div class="row">

                        <!--Column Start -->
                        <div class="col-md-11 ">

                            <!--Panel Body Starting-->
                            <div class="panel panel-default">

                                <!-- Post Heading Starts -->
                                <div class="panel-heading">

                                    <i class="fa fa-tag">:{{$post->tags}}</i>
                                    <br>
                                    <a href="{{url('profile='.$user->id)}}" style="text-decoration:none">	

                                        <!--Padding -->			  
                                        <div style="padding-top:10px">
                                             <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				
                                             <div style="padding-left:40px;"> {{ \Carbon\Carbon::parse($post->created_at)->format('l j F Y') }}</div>

                                        </div>
                                        <!--Padding Ends-->

                                    </a>
                                     @endif
                                    @endforeach	
                                     <!--User Information Ends -->				
                                </div>			
                                <!--Post Heading Ends -->


                                <a href="{{url('blog='.$post->slug)}} " style="text-decoration:none">
		
                                <div style="text-align:center;">
                                      <h3>Title - {{$post->title}}</h3>
                                </div>
                
                                <div class="panel-body">
                                     {!!$post->content!!}
                                </div>

                            </div>
                            <!--Post Body Ends-->

                                </a>			
				
                        </div><!--Column Ends-->

                    </div><!--Row Ends-->


                @endforeach
                 <!--Post Ends -->
							
                    <div class="clearfix"></div>
					
            </div><!--About Left Ends-->
			
        </div><!--About Main Ends -->
				

			<div class="col-md-4 about-right heading"><!--Column Start-->

				<div class="panel panel-default"><!--Panel Start-->

					<div class="abt-2"><!--About-->

						<h3>Workspace</h3>

					
							<ul>
							
							<h4><li><a href="{{route('users')}}">Users({{$usercount}})</a></li></h4>
							<h4><li><a href="{{route('posts.index')}}">Posts({{$postcount}})</a></li></h4>
							<h4><li><a href="{{route('projects.index')}}">Projects({{$projectcount}})</a></li></h4>
							<h4><li><a href="{{route('forums.index')}}">Discussions({{$forumcount}})</a></li></h4>
							<ul>

						
					</div><!--About-->
					
				</div><!--Panel Ends-->
				
				<div class="panel panel-default"><!--Panel Start-->
				
					<div class="abt-2"><!--About 2 Start-->
						<h3>Latest Projects</h3> 

                                 <ul>
								    <!--Post Starts -->			
                                  @foreach($projects as $projects)
								    @foreach($users as $user)
                                   @if($projects->user_id == $user->id)

							       <li><a href="{{url('project='.$projects->slug)}}">{{$projects->title}} </a> by  <a href="{{url('profile='.$user->id)}}" style="text-decoration:none">{{$user->name}} </a></li>
								   @endif
								   @endforeach
								   @endforeach
						        </ul>	


					</div><!--About 2 Ends--> 

				</div><!--Panel Ends--> 




		        <div class="panel panel-default">
			            <div class="abt-2">
			               <h3>Latest Questions</h3>
					            <ul>
								    <!--Post Starts -->			
                                  @foreach($questions as $question)
								    @foreach($users as $user)
                                   @if($question->user_id == $user->id)

							       <li><a href="{{url('question='.$question->slug)}}">{{$question->title}} </a> by  <a href="{{url('profile='.$user->id)}}" style="text-decoration:none">{{$user->name}} </a></li>
								   @endif
								   @endforeach
								   @endforeach
						        </ul>	

				        </div>
		        </div>
					
				<div class="clearfix"></div>

			</div><!--Column Ends-->


    </div><!--Container Ends-->

</div>
<!--about-end-->

@endsection