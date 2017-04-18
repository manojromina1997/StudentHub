@extends('layouts.master')
@section('title')
StudentHub - Blog
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
				<a href="{{route('posts.create')}}"/><h3>Add a New Post</h3></a>
			</div>
		</div>
	</div>
<!--welcome-end-->

<!--about-starts-->
	<div class="about" style="margin=top:10px;"><!--About-->
		<div class="container"><!--Container-->
			<div class="about-main"><!--About Main-->
				<div class="col-md-10 about-left"><!--Column-->		

                    <!--Post -->	
				@foreach($posts as $post)
			        @if($currentuser->id == $post->user_id)

                      <!--User Starts-->
				      @foreach($users as $user)
                       @if($post->user_id == $user->id)
                     <div class="row"><!--Row Inner -->
                          <div class="col-md-11 "><!--Column Inner-->
                               <div class="panel panel-default"><!--Panel Default-->

                                 
								 
			                        <!--Post Heading Starts-->
			                       <div class="panel-heading">
			                            <i class="fa fa-tag">:{{$post->tags}}</i>
			                            <br>
	                                       <a href="{{url('profile='.$user->id)}}" style="text-decoration:none">	
			                                   <div style="padding-top:10px">
			                                   <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				                               <div style="padding-left:40px;"> {{ \Carbon\Carbon::parse( $post->created_at)->format('l j F Y') }}</div>
				                               </div>	
                                          </a>
										  
                                     
                                   </div><!--Post Heading Ends -->
								
							
				        @endif
				        @endforeach	
                        <!--User Ends-->
                              

			         <a href="{{url('blog='.$post->slug)}} " style="text-decoration:none">
			                       <!--Post Body-->
			                       <div style="text-align:center;">
			                            <h3>{{$post->title}}</h3>
			                        </div>
                                
                                    <div class="panel-body">
				                         {!!$post->content!!}
                                    </div>
                     </a>	
			<a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy',$post->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
                                 </div><!--Pannel Default-->
                                    <!--Post Body-->
                             	
	
				               
				@else<!--IF currentuse is not added the post then he will see this part-->
			                      <!--User Starts-->
				      @foreach($users as $user)
                       @if($post->user_id == $user->id)
                          <div class="row"><!--Row Inner -->
                            <div class="col-md-11 "><!--Column Inner-->
                               <div class="panel panel-default"><!--Panel Default-->

                                 
			                        <!--Post Heading Starts-->
			                       <div class="panel-heading">
			                            <i class="fa fa-tag">:{{$post->tags}}</i>
			                            <br>
	                                       <a href="{{url('profile='.$user->id)}}" style="text-decoration:none">	
			                                   <div style="padding-top:10px">
			                                   <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				                               <div style="padding-left:40px;"> {{ \Carbon\Carbon::parse( $post->created_at)->format('l j F Y') }}</div>
				                               </div>	
                                          </a>
                                     
                                   </div><!--Post Heading Ends -->
								
							
				        @endif
				        @endforeach	
                        <!--User Ends-->
                              

			                    <a href="{{url('blog='.$post->slug)}} " style="text-decoration:none">
			                       <!--Post Body-->
			                       <div style="text-align:center;">
			                            <h3>{{$post->title}}</h3>
			                        </div>
                                
                                    <div class="panel-body">
				                         {!!$post->content!!}
                                    </div>

                                 </div><!--Pannel Default-->
                                    <!--Post Body-->
                               </a>			
				               
                @endif<!--IF currentuse is not added the post then he will see this part-->

			</div><!--Column Inner-->
			</div><!--Row Inner-->
		
           @endforeach
           <!--Post -->

							<div class="clearfix"></div>
						</div>
			
				</div><!--Column-->
				</div><!--About Main-->
				</div><!--Container-->
				</div><!--About-->

@endsection