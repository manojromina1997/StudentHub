@extends('layouts.master')
@section('title')
StudentHub - New Project
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
				<a href=""/><h3>New Project</h3></a>
			</div>
	</div>
</div>
	
<div class="container" ><!--Container Starts -->
    <div class="row"><!--Row Start-->
        <div class="col-md-10 col-md-offset-1"><!--Column Starts -->
           <div class="panel panel-default"><!--Panel Default Starts-->
                <div class="panel-body"> <!--Panel Body Starts-->
                      {!! Form::model($items, ['method' => 'PATCH','route' => ['projects.update', $items->id]]) !!}
                        {{ csrf_field() }}
                        <input type="hidden"  name="user_id" value= {{ Auth::user()->id }} >
                        <div class="control-group">
		                    <div class="controls">
                                   Project Tile: 
                                     {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                    <br />	
		                    </div>
		                </div> 
		                <div class="control-group">
		                    <div class="controls">
							 
                                 Project Tags(Technology used like php , asp.net etc): 
                                {!! Form::text('tags', null, array('placeholder' => 'Tags','class' => 'form-control')) !!}	<br />	
		                    </div>
		                </div> 		

                        <div class="control-group">
		                    <div class="controls">
                                 Project Description :  {!! Form::textarea('description', null, array('placeholder' => 'description','class' => 'tinymce')) !!}    
		                    </div>
		                </div> 	
                        <br>
                        <div class="control-group">
		                    <div class="controls">
                                  Project Link (Upload the file to dropbox or google drive and share its link):
                                    {!! Form::text('sharelink', null, array('placeholder' => 'ShareLink','class' => 'form-control')) !!}<br />	
		                    </div>
		                </div>  

                        <div class="submit-btn">
							
								 <button type="submit" class="btn btn-primary">POST</button>
								
						 </div>
            

        
                     {!! Form::close() !!}
                </div><!--Pannel Body Ends-->
            </div><!--Pannel Default Ends-->
     
        </div><!--Column Ends-->
    </div><!--Row Ends-->
</div><!--Container Ends-->
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