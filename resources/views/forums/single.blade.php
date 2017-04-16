@foreach($question as $question)
			
  @foreach($users as $user)
    @if($question->user_id == $user->id)

      @extends('layouts.master')
      @section('title')
         StudentHub - {{$question->title}}
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

    
    <div class="about" style="margin=top:20px"><!--about us-->
		<div class="container"><!--container-->
				
            <div class="row"><!--row-->
                 <div class="col-md-11 "><!--column-->
                      <div class="panel panel-default"><!--panel default-->

			               <!--Panel Heading Starts-->
			              <div class="panel-heading">
			                   <i class="fa fa-tag">:{{$question->tags}}</i>
			                   <br>
		
	                           <a href="{{url($user->name)}}" style="text-decoration:none">	
			                        <div style="padding-top:10px">
			                            <img src="/uploads/avatars/{{$user->avatar}}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name}}<br>
				                             <div style="padding-left:40px;"> 
											      {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $question->created_at)->format('l j F Y') }}
											 </div>
				                    </div>	
				                </a>
                          </div><!--pannel heading-->
                                   
 
                       <!--<a href="{{url($question->slug)}} " style="text-decoration:none">-->
			         
			          <div style="text-align:center;">
			                <h3>{{$question->title}}</h3>
			          </div>
                     <div class="panel-body">				
				          {!!$question->content!!}		
				     </div>
			   
                 <!-- </a>-->
			      </div><!--panel default-->
			  </div><!--column-->
          </div><!--row-->
		</div><!--container-->
         <br>
           <br>
           <br>
           <h2></h2> 
		   <br>
           <br>
     @endif
  @endforeach	
        <h2 style="text-align:center">Answer</h2>
  		

         <div class="row"><!--row-->
              <div class="col-md-8 col-md-offset-2 "><!--column-->
                    {!! Form::open(array('route' => 'forumsanswer.store','method'=>'POST')) !!}
                         {{ csrf_field() }}
	                     <input type="hidden"  name="user_id" value= {{ Auth::user()->id }} >
	                     <input type="hidden"  name="forum_question_id" value= {{ $question->id }} >
                         <div class="control-group">
	                          <div class="controls">
                                 {!! Form::textarea('answer', null, array('placeholder' => 'Answer','class' => 'tinymce')) !!}
	                          </div>
	                     </div> 	
	                      <div class="submit-btn">
							
								 <button type="submit" class="btn btn-primary">Answer</button>
								
						 </div>
	                {!! Form::close() !!}

             </div><!--column-->
         </div><!--row-->


         <br>
         <br>
         <br>

          <h2 style="text-align:center">Answers</h2>
              @foreach($answer as $answer)
                  @if($question->id == $answer->forum_question_id)

                    @if($currentuser->id == $answer->user_id)<!--if current user has commented-->

				       @foreach($users as $user) 
						   @if($answer->user_id == $user->id)
                               <div class="row"><!--row-->
                                    <div class="col-md-8 col-md-offset-2 "><!--column-->

                                         <div class="panel panel-default"><!--panel default-->
		                                      <div class="panel-heading">
	                                               <div style="padding-top:10px">
			                                            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name }}<br>
				                                        <div style="padding-left:40px;"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $answer->created_at)->format('l j F Y') }}</div>
				                                   </div>	
		                                            <br>
                                              </div>
		                                      <div class="panel-body">
                                                  <h4>	{!!$answer->answer!!}<h4>
	                                          </div>
           <a class="btn btn-primary" href="{{ route('forumsanswer.edit',$answer->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['forumsanswer.destroy',$answer->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
	                                     </div><!--panel default-->

	                                </div><!--column-->
	                           </div><!--row-->
	                      
						 

                             @endif
                       @endforeach

                     @else<!--if current user has not commented-->
                            @foreach($users as $user) 
						   @if($answer->user_id == $user->id)
                               <div class="row"><!--row-->
                                    <div class="col-md-8 col-md-offset-2 "><!--column-->

                                         <div class="panel panel-default"><!--panel default-->
		                                      <div class="panel-heading">
	                                               <div style="padding-top:10px">
			                                            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:30px ; height:30px ;float-left;border-radius:10%;margin-right:5px;"/> {{$user->name }}<br>
				                                        <div style="padding-left:40px;"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $answer->created_at)->format('l j F Y') }}</div>
				                                   </div>	
		                                            <br>
                                              </div>
		                                      <div class="panel-body">
                                                  <h4>	{!!$answer->answer!!}<h4>
	                                          </div>
	                                     </div><!--panel default-->
	                                </div><!--column-->
	                           </div><!--row-->
	                      
						 

                             @endif
                       @endforeach


                      @endif
					@endif
                @endforeach
				</div><!--about us-->
	     <br>
         <br>
         <br>	
    @endforeach
        

@endsection

	    <!--Text Editor-->
    <script type="text/javascript" src="js/jquery.min.jss"></script>
        <script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
          <script type="text/javascript" src="plugins/tinymce/init-tinymce.js"></script>
          <!--Text Editor-->