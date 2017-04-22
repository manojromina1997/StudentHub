@extends('layouts.master')
@section('title')
StudentHub - AboutUs
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
				<h3>Chat</h3>
				<div class="welcome-bottom" style="height:500px">

				<iframe src="https://gitter.im/IncubatorVimeet/Lobby/~embed" style="width: 100%;height: 100%;border: 0;">
				    
				</div>
			</div>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<!--welcome-end-->

    @endsection