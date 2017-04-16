@extends('layouts.master')
@section('title')
StudentHub - New Question
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
				<a href=""/><h3>New Question</h3></a>
			</div>
		</div>
	</div>
	
<div class="container" >
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
                <div class="panel-body">  
                      {!! Form::open(array('route' => 'forums.store','method'=>'POST')) !!}
                        {{ csrf_field() }}
                  <input type="hidden"  name="user_id" value= {{ Auth::user()->id }} >	
                         <div class="control-group{{ $errors->has('title') ? ' has-error' : ''}} ">
		                      <div class="controls">
                                   Post Tile: 
                                   {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                 
					               @if ($errors->has('title'))
                                       <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                       </span>
                                   @endif	
		                        </div>
		                 </div> 
						 
						 
		                 <div class="control-group{{ $errors->has('tags') ? ' has-error' : ''}} ">
		                      <div class="controls">
					               Post Tags(Technology used like php , asp.net etc): 
                                   {!! Form::text('tags', null, array('placeholder' => 'Tags','class' => 'form-control')) !!}	
		                           @if ($errors->has('tags'))
                                       <span class="help-block">
                                             <strong>{{ $errors->first('tags') }}</strong>
                                       </span>
                                   @endif
					          </div>
		                </div> 		

                        <div class="control-group{{ $errors->has('content') ? ' has-error' : '' }}">
		                     <div class="controls">
                                  Post Content :   {!! Form::textarea('content', null, array('placeholder' => 'Content','class' => 'tinymce')) !!}
					              @if ($errors->has('content'))
                                      <span class="help-block">
                                           <strong>{{ $errors->first('content') }}</strong>
                                      </span>
                                 @endif    
		                     </div>
		                </div> 	
   
                          <div class="submit-btn">
							
								 <button type="submit" class="btn btn-primary">POST</button>
								
						 </div>
                         {{ csrf_field() }}
                       {!! Form::close() !!}
                    </div>
                    </div>
     
        </div>
    </div>
</div>
    <br>
    <br>


		</div>
	</div>

@endsection

    <!--Text Editor-->
    <script type="text/javascript" src="/js/jquery.min.jss"></script>
        <script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
          <script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
          <!--Text Editor-->