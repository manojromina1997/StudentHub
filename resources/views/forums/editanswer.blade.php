@extends('layouts.master')
@section('title')
StudentHub - New Post
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
<a href=""/><h3>Edit Answer</h3></a>
</div>
</div>
</div>
	
<div class="container" ><!--Container Start-->
    <div class="row"><!--Row Start -->
        <div class="col-md-10 col-md-offset-1"><!--Column Start -->
           <div class="panel panel-default"><!--Pannel Default Start-->
                <div class="panel-body">  <!--Panel Body Start -->
                     {!! Form::model($items, ['method' => 'PATCH','route' => ['forumsanswer.update', $items->id]]) !!}
                        {{ csrf_field() }}
 
                         <input type="hidden"  name="user_id" value= {{ Auth::user()->id }} >
                         {!! Form::hidden('forum_question_id', null, array('placeholder' => 'forum_question_id','class' => 'form-control')) !!} 
                          

                        <div class="control-group{{ $errors->has('content') ? ' has-error' : '' }}">
		                     <div class="controls">
                                  Post Content :   {!! Form::textarea('answer', null, array('placeholder' => 'answer','class' => 'tinymce')) !!} 
					              @if ($errors->has('content'))
                                      <span class="help-block">
                                           <strong>{{ $errors->first('content') }}</strong>
                                      </span>
                                 @endif    
		                     </div>
		                </div> 	
   
                          <div class="submit-btn">
								<form>
									<input type="submit" value="Update">
								</form>
						 </div>
                     {!! Form::close() !!}

                </div><!--Panel Body Ends-->
            </div><!--Panel Default Ends-->
   

        </div><!--Columns Ends-->
    </div><!--Row Ends-->
</div><!--Container Ends-->

    <br>
    <br>
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