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

<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">

<div class="panel panel-default" style="padding-left:20px">

<h2>   {{ Auth::user()-> name }}'s Profile</h><br><br>
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


    <br>
    <br>
    <br>
    <br>
  @foreach($profile as $profile)		
@if($user->id == $profile->user_id)	
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
<br>
 <a href="{{route('profiledetail.edit',$profile->id)}}"><input  class=" btn btn-sm btn-primary" value="Edit"></a>

        </div>
    </div>
</div>

</div>


    @endsection

    
    <!--Text Editor-->
    <script type="text/javascript" src="js/jquery.min.jss"></script>
        <script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
          <script type="text/javascript" src="plugins/tinymce/init-tinymce.js"></script>
          <!--Text Editor-->













          