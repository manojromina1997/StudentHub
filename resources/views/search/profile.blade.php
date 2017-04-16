
@extends('layouts.master')
<!--Users Starts -->
@foreach($users as $users)
@section('title')
StudentHub - {{$users -> name}}
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

<!-- Container Starts -->
<div class="container">

    <!-- Row Starts -->
    <div class="row">

        <!--Column Satrts-->
        <div class="col-md-10 col-md-offset-1">

            <!-- Panel Default Starts-->
            <div class="panel panel-default" style="padding-left:20px">

                 <!--User Image Start -->

                    <h2>{{ $users-> name }}'s Profile</h><br>
                    <img src="/uploads/avatars/{{$users->avatar}}" style="width:150px ; height:150px ;float-left;border-radius:50%;margin-right:25px;"/>

                <!--User Image Ends -->  

                <!--Profile Start -->
                @foreach($profile as $profile)		
                @if($users->id == $profile->user_id)

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


             <!--Panel Default Starts-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="post">
                        <h2 style="text-align:center">Post({{$postcount}})</h2>
                    </div>
                </div>

                <!--Post Start -->
                @foreach($post as $post)
                @if($users->id = $post->user_id)

                <!--Post Body Starts-->
                <div class="panel-body">
                    <a href="{{url('blog='.$post->slug)}} " style="text-decoration:none">
		
                        <div style="text-align:center;">
                             <h3>Title - {{$post->title}}</h3>
                        </div>

                        <div class="panel-body">
                             {!!$post->content!!}
                        </div>
			
                    </a>	

                </div>		
                <!--Post Body Ends-->
                <br>

                @endif
                @endforeach
                <!--Post  Ends -->
				
            </div><!--Panel Default Ends -->


            <!-- Panel Default Starts -->
            <div class="panel panel-default">
                 <div class="panel-heading">

                    <div class="post">
                         <h2 style="text-align:center">Project({{$projectcount}})</h2>
                    </div>

                </div>


                 <!--Projects Start-->
                 @foreach($project as $project)
                 @if($users->id = $project->user_id)

                    <!--Post Body-->
                     <div class="panel-body">

                         <a href="{{url('project='.$project->slug)}} " style="text-decoration:none">
		
                            <div style="text-align:center;">
                                 <h3>Title - {{$project->title}}</h3>
                            </div>

                            <h4>Project Link - {{$project->sharelink}}</h4>

                            <!-- Panel Body Starts-->                
                            <div class="panel-body">
                                 {!!$project->description!!}
                             </div>
	
                         </a>			

                    </div>
                   <!--Post Body Ends-->
				   <br>
                @endif
                @endforeach
                <!--Projects Ends-->

            </div>
            <!-- Panel Default Ends -->

        </div>
        <!-- Column Ends -->

    </div>
    <!-- Row Ends -->

</div>
<!--Container Ends -->

  
  

@endforeach
@endsection
<!--User Ends -->