@extends('layouts.master')
@section('title')
StudentHub - Forum
@endsection
@section('content')
<!-- script-for-menu -->
<script>
$("span.menu").click(function(){
$(" ul.navig").slideToggle("slow" , function(){
});
});
</script>
<!-- script-for-menu -->

<!--welcome-starts-->
<div class="welcome">
	<div class="container">
		<div class="welcome-top heading">
			<a href="{{route('forums.create')}}"/><h3>Add a Question</h3></a>
		</div>
	</div>
</div>
<!--welcome-end-->
	



    <div class="about" style="margin=top:10px;"><!--About Starts -->
		<div class="container"><!--Container Starts -->
			<div class="about-main"><!--About Main Start -->
				<div class="col-md-10 about-left">	<!--About Left Starts-->		
					  @foreach($forumquestion as $forumquestion)
			             @if($currentuser->id == $forumquestion->user_id)

                      <!--if current user has written the question he will see the delete and edit button-->


				          @foreach($users as $user)
                             @if($forumquestion->user_id == $user->id)

							   
                                 <div class="row"><!--Row Starts-->
                                        <div class="col-md-11 "><!--Column Starts-->
                                            <div class="panel panel-default"><!--Panel Default Starts-->

			                                    <!--Question Heading Starts-->
			                                    <div class="panel-heading">
			                                        <i class="fa fa-tag">:{{$forumquestion->tags}}</i>
			                                         <br>
	                                                <a href="{{url('profile='.$user->id)}}" style="text-decoration:none">	
			                                            <div style="padding-top:10px">
			                                                 <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				                                            <div style="padding-left:40px;"> {{ \Carbon\Carbon::parse( $forumquestion->created_at)->format('l j F Y') }}</div>
				                                        </div>	
                                                    </a>
												 </div>	<!--Question HEading Ends-->
												 
												 <a href="{{url('question='.$forumquestion->slug)}} " style="text-decoration:none">
			                                        <!--Question Body Starts-->
			                                       <div style="text-align:center;">
			                                            <h3>Title - {{$forumquestion->title}}</h3>
			                                        </div>
													
                                                   <div class="panel-body">
	
				
				                                        {!!$forumquestion->content!!}
		
				                                    </div>
			                                      <!--Question Body Ends-->
                                                </a>

			<a class="btn btn-primary" href="{{ route('forums.edit',$forumquestion->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['forums.destroy',$forumquestion->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
			                                </div><!--Panel Defaut Ends-->
			
				

			                            </div><!--Column Ends-->
			                     </div><!--Row Ends -->
		                     @endif
                        @endforeach

					   @else
					    @foreach($users as $user)
                             @if($forumquestion->user_id == $user->id)

							   
                                 <div class="row"><!--Row Starts-->
                                        <div class="col-md-11 "><!--Column Starts-->
                                            <div class="panel panel-default"><!--Panel Default Starts-->

			                                    <!--Question Heading Starts-->
			                                    <div class="panel-heading">
			                                        <i class="fa fa-tag">:{{$forumquestion->tags}}</i>
			                                         <br>
	                                                <a href="{{url('profile='.$user->id)}}" style="text-decoration:none">	
			                                            <div style="padding-top:10px">
			                                                 <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				                                            <div style="padding-left:40px;"> {{ \Carbon\Carbon::parse( $forumquestion->created_at)->format('l j F Y') }}</div>
				                                        </div>	
                                                    </a>
												 </div>	<!--Question HEading Ends-->
												 
												 <a href="{{url('question='.$forumquestion->slug)}} " style="text-decoration:none">
			                                        <!--Question Body Starts-->
			                                       <div style="text-align:center;">
			                                            <h3>Title - {{$forumquestion->title}}</h3>
			                                        </div>
													
                                                   <div class="panel-body">
	
				
				                                        {!!$forumquestion->content!!}
		
				                                    </div>
			                                      <!--Question Body Ends-->
                                                </a>
			                                </div><!--Panel Defaut Ends-->
			
				

			                            </div><!--Column Ends-->
			                     </div><!--Row Ends -->
		                     @endif
                        @endforeach

						@endif      
				    @endforeach	
                    
					<div class="clearfix"></div>
						
				</div><!--About Left Ends -->
			
			</div><!--About Main Ends-->

		
		</div><!--Container Ends-->
   </div><!--About Ends-->
			<br>
			<br>
			<br>
			<br>
			
		
    @endsection