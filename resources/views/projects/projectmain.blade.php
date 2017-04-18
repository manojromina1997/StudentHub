@extends('layouts.master')
@section('title')
StudentHub - Projects
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
 <!--welcome-starts-->
	<div class="welcome">
		<div class="container">
			<div class="welcome-top heading">
				<a href="{{route('addproject')}}"/><h3>Add a New Projects</h3></a>
			</div>
		</div>
	</div>
<!--welcome-end-->
<!--about-starts-->
	<div class="about" style="margin=top:10px;"><!--About Start -->
		<div class="container"><!--Container Starts-->
			<div class="about-main"><!--About Main Starts -->
				<div class="col-md-10 about-left"><!--About Left Start-->
					  @foreach($project as $projects)
			
				        @foreach($users as $user)
                            @if($projects->user_id == $user->id)
                                <div class="row"><!--Row start -->
                                    <div class="col-md-11 "><!--Column Starts-->
                                         <div class="panel panel-default"><!--Panel Defaul Starting -->

			                                <!--Post Heading Starts-->
			                                    <div class="panel-heading">
			                                         <i class="fa fa-tag">:{{$projects->tags}}</i>
			                                         <br>
	                                                 <a href="{{url('profile='.$user->id)}}" style="text-decoration:none">	
			                                         <div style="padding-top:10px">
			                                              <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				                                          <div style="padding-left:40px;"> {{ \Carbon\Carbon::parse( $projects->created_at)->format('l j F Y') }}</div>
				                                     </div>	
                                                    </a>
												</div>	<!--Post Heading Ends -->
												
										    <a href="{{url('project='.$projects->slug)}} " style="text-decoration:none">
			                                   <!--Post Body-->
			                                   <div style="text-align:center;">
			                                        <h3>{{$projects->title}}</h3>
			                                   </div>
                                               <div class="panel-body">
	
				
				                                    {!!$projects->description!!}
		
				                                </div>
			                                   	<!--Post Body-->
                                            </a>
			                            </div><!--Panel Default Ends-->
			
			                        </div><!--Column Ends-->
			                    </div><!--Row ends -->
		
				            @endif
				        @endforeach	
                    @endforeach
							<div class="clearfix"></div>
				</div><!--About LEft Ends-->
			
			</div><!--About Maine Ends-->
		</div><!--Container Ends-->
	</div><!--About Ends -->

@endsection