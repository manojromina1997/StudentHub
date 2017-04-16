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
				<h3>WELCOME</h3>
				<div class="welcome-bottom">

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut faucibus sapien sit amet turpis faucibus dictum. Nam turpis nisi, hendrerit nec dictum ut, egestas ac metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique iaculis placerat. Etiam dignissim ultrices molestie. Proin nisl turpis, congue iaculis tortor at, sollicitudin ultricies est. Nunc sit amet turpis elit.</p>
				<p>Etiam quis malesuada sem, sit amet tempus nulla. Vivamus non tellus auctor, ullamcorper risus at, sodales dolor. Sed quam magna, tincidunt in tincidunt vel, maximus in diam. Fusce euismod auctor lorem eget consequat. Curabitur egestas ultricies purus a euismod. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce justo sapien, posuere vel erat non, hendrerit eleifend purus. Cras auctor, lacus eget elementum consequat, velit ipsum posuere dolor, eu pretium est magna tristique metus. Cras eu dolor commodo, convallis libero sed, lacinia arcu. Etiam rutrum nulla enim, a pharetra nisl auctor quis. Phasellus et dui ultricies, convallis massa consequat, molestie felis. Sed sed purus vitae tellus viverra semper. Mauris lacinia dignissim tellus nec scelerisque. Donec sit amet nibh tincidunt, egestas dolor eu, volutpat urna. Morbi semper hendrerit ligula ut sagittis.</p>
				</div>
			</div>
		</div>
	</div>
	<!--welcome-end-->
	<!--team-starts-->
	<div class="team">
		<div class="container">
		<div class="team-top heading">
			<h3>OUR INSPIRATION</h3>
		</div>
			<div class="team-bottom">
				<div class="col-md-3 team-left">
					<img src="images/t2.jpg" alt="" />
					<h4>Steves Jobs</h4>
					<p>Fusce at elementum diam. Integer pellentesque ultricies pharetra.</p>
				</div>
				<div class="col-md-3 team-left">
					<img src="images/t3.jpg" alt="" />
					<h4>Bill Gates</h4>
					<p>Fusce at elementum diam. Integer pellentesque ultricies pharetra.</p>
				</div>
				<div class="col-md-3 team-left">
					<img src="images/t4.jpg" alt="" />
					<h4>Larry Page</h4>
					<p>Fusce at elementum diam. Integer pellentesque ultricies pharetra.</p>
				</div>
				<div class="col-md-3 team-left">
					<img src="images/t1.jpg" alt="" />
					<h4>Mark Zuckerberg</h4>
					<p>Fusce at elementum diam. Integer pellentesque ultricies pharetra.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--team-end-->
    @endsection