@extends('layouts.master')
@section('title')
StudentHub - UpdateProfile
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

<div class="container"><!--Container -->
<div class="row"><!--Row -->
<div class="col-md-10 col-md-offset-1"><!--Column-->

<h2>{{ Auth::user()-> name }}'s Profile</h><br><br>
<img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:150px ; height:150px ;float-left;border-radius:50%;margin-right:25px;"/>
<br>
<div style="font-size:15px;">
     <form enctype="multipart/form-data" action="/updateprofilephoto" method="POST">
            <label>Update Profile Image</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
            <input type="submit" class=" btn btn-sm btn-primary">
    </form>
</div>

</div> <!--Column-->
</div> <!--Row-->
</div> <!--Container-->

    <br>
    <br>

    <div class="container" ><!--Container-->
         <div class="row"><!--Row-->
               <div class="col-md-10 col-md-offset-1"><!--Column-->
                    <div class="panel panel-default"><!--Panel-->
                         <div class="panel-body">  <!--Panel Body-->
                     
                              {!! Form::open(array('route' => 'profiledetail.store','method'=>'POST')) !!}
                                  {{ csrf_field() }}
 
                                <input type="hidden"  name="user_id" value= {{ Auth::user()->id }} >
                         
                                <div class="control-group">
		                             <div class="controls">
                                           Technology You Know: 
                                            {!! Form::text('technology', null, array('placeholder' => 'Technology','class' => 'form-control')) !!}<br />	
		                             </div>
		                        </div> 

		                        <div class="control-group">
		                             <div class="controls">
				                          Field of Interest: 
                                           {!! Form::text('interest', null, array('placeholder' => 'Interest','class' => 'form-control')) !!}<br />	
		                            </div>
		                       </div> 		

                               <div class="control-group">
		                            <div class="controls">
                                         More About You : 
                                         {!! Form::textarea('about', null, array('placeholder' => 'About','class' => 'tinymce')) !!}
                                         <</textarea>     
		                            </div>
		                       </div> 	
   
                                <div class="submit-btn">
							
								 <button type="submit" class="btn btn-primary">Update</button>
								
						 </div>
                    </form>
                    </div><!--Panel Body-->
                </div><!--Panel-->
     
        </div><!--Column-->
    </div><!--Row-->
</div><!--Container-->

    
<br>
@endsection

    
<!--Text Editor-->
<script type="text/javascript" src="/js/jquery.min.jss"></script>
<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
<!--Text Editor-->
