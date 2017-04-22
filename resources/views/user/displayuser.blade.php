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
				<a href=""/><h3>Profiles</h3></a>
			</div>
		</div>
	</div>
<!--welcome-end-->

<!--about-starts-->
	
	<div class="about" style="margin=top:10px;"><!--About-->
		<div class="container"><!--Container-->
			<div class="about-main"><!--About Main-->
				<div class="col-md-10 about-left"><!--Column-->		

              	@foreach($users as $user)
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
              

@endsection