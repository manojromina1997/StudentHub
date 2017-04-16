 <!--For Post Started-->
@foreach($projects as $project)
    <!--For User Started-->			
    @foreach($users as $user)

        @if($project->user_id == $user->id)

            @extends('layouts.master')
            @section('title')
            StudentHub - {{$project->title}}
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

             @if (Session::has('info'))
                <div style="text-align:center" class="alert alert-info" role="alert">
                      {{Session::get('info')}}
                 </div>
            @endif

                <div class="about" style="margin=top:20px"><!--About Class Start -->
                    <div class="container">
				
                        <div class="row">
                            <div class="col-md-11 "><!--Column Start -->
                               <div class="panel panel-default"><!--Panel Default Start-->

			                        <!--Panel Heading Starts-->
			                        <div class="panel-heading">
			                             <i class="fa fa-tag">:{{$project->tags}}</i>
			                             <br>
		
	                                    <a href="{{url($user->name)}}" style="text-decoration:none">	
			                                <div style="padding-top:10px">
			                                     <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				                                 <div style="padding-left:40px;"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $project->created_at)->format('l j F Y') }}</div>
				                                    
								            </div>	
			                            </a>
                                    </div><!--Pannel Heading Ends -->
            
 
                                     <a href="{{url($project->slug)}} " style="text-decoration:none">
			
			                            <div style="text-align:center;">
			                                 <h3>Title - {{$project->title}}</h3>
			                                 </div>
							 
										     <div class="panel-body">				
				                                  {!!$project->description!!}		
				                             </div>

                                             <div>
			                                    <h2> Project Link </h2>:<a href="{{$project->sharelink}}" target="_blank"> {{$project->sharelink}}</a>
				                            </div>	
						            </a>	 
			                    </div><!--Panel Default Ends-->
   
			
			                </div><!--Column Ends -->
					
                        </div><!--Row Ends -->
				
		            </div><!--Container Ends -->


     	
         @endif
         @endforeach
                  <br>
                  <br>
                  <br>
		          <br>
                  <br>
  

                   <h2 style="text-align:center">Comment</h2>
  		

                   <div class="row"> 
		                <!--Comment Row Start-->
                        <div class="col-md-8 col-md-offset-2 "><!--Column Start-->
	                           {!! Form::open(array('route' => 'projectscomment.store','method'=>'POST')) !!}
                         {{ csrf_field() }}
	                     <input type="hidden"  name="user_id" value= {{ Auth::user()->id }} >
	                     <input type="hidden"  name="project_id" value= {{ $project->id }} >
                         <div class="control-group">
	                          <div class="controls">
                                 {!! Form::textarea('comment', null, array('placeholder' => 'comments','class' => 'tinymce')) !!}
	                          </div>
	                     </div> 	
	                      <div class="submit-btn">
							
								 <button type="submit" class="btn btn-primary">Comment</button>
								
						 </div>
	                {!! Form::close() !!}
                        </div><!--Column Ends-->
                    </div><!--Comment Row Ends -->


                    <br>
                    <br>
                    <br>
	
        
 
                    <h2 style="text-align:center">Comments</h2>
	                 <!--Comment Starts-->
                   
                    @foreach($projectscomment as $projectcomment)
                         @if($project->id == $projectcomment->project_id)

                         @if($currentuser->id == $projectcomment->user_id)<!--if current user has commented-->
						    @foreach($users as $user) 
							   @if($projectcomment->user_id == $user->id)
                               <div class="row"><!--Row Start-->
                                   <div class="col-md-8 col-md-offset-2 "><!--Column Start -->

                                       <div class="panel panel-default"><!--Panel Default Start-->
		                                    <div class="panel-heading">
	                                             <div style="padding-top:10px">
			                                         <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				
				                                           <div style="padding-left:40px;"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectcomment->created_at)->format('l j F Y') }}</div>
				                                 </div>	
		                                         <br>
                                            </div>
						
		                                    <div class="panel-body">
                                                 <h4>	{!!$projectcomment->comment!!}<h4>
	                                        </div>
				<a class="btn btn-primary" href="{{ route('projectscomment.edit',$projectcomment->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['projectscomment.destroy',$projectcomment->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}   
                                            
	                                     </div><!--Pannel Default Ends-->
	                                </div><!--Colum Ends -->
	                            </div><!--Row Ends-->
						        @endif	
                            @endforeach  

                      @else<!--if current user has not commented-->
                      	    @foreach($users as $user) 
							   @if($projectcomment->user_id == $user->id)
                               <div class="row"><!--Row Start-->
                                   <div class="col-md-8 col-md-offset-2 "><!--Column Start -->

                                       <div class="panel panel-default"><!--Panel Default Start-->
		                                    <div class="panel-heading">
	                                             <div style="padding-top:10px">
			                                         <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				
				                                           <div style="padding-left:40px;"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectcomment->created_at)->format('l j F Y') }}</div>
				                                 </div>	
		                                         <br>
                                            </div>
						
		                                    <div class="panel-body">
                                                 <h4>	{!!$projectcomment->comment!!}<h4>
	                                        </div>
				
                                            
	                                     </div><!--Pannel Default Ends-->
	                                </div><!--Colum Ends -->
	                            </div><!--Row Ends-->
						        @endif	
                            @endforeach  
                         @endif

		                @endif
                    @endforeach
	                <!--Comment Ends-->
		
                 </div><!-- About class Ends-->
				 
		

	 

     
<br>
<br>
<br>	
@endforeach
<!--Post Ends-->        

@endsection

<!--Text Editor-->
<script type="text/javascript" src="js/jquery.min.jss"></script>
<script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="plugins/tinymce/init-tinymce.js"></script>
<!--Text Editor-->