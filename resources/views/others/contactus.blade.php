@extends('layouts.master')
@section('title')
StudentHub - ContactUs
@endsection
@section('content')
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>

	<!----start-contact---->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h3>CONTACT</h3>
			</div>
  
				<div class="contact-text">
                          <div style="text-decoration:none; overflow:hidden; height:500px; width:1500px; max-width:100%;">
<div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;">
<iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Vishwaniketan's+Institute+of+Management+Entrepreneurship+and+Engineering+Technology,India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
<a class="code-for-google-map" rel="nofollow" href="https://www.interserver-coupons.com" id="enable-map-data">interserver-coupons.com</a><style>#google-maps-canvas img{max-width:none!important;background:none!important;font-size: inherit;}</style></div>
<script src="https://www.interserver-coupons.com/google-maps-authorization.js?id=1c2a709b-91da-3051-96dc-af647f8188b1&c=code-for-google-map&u=1474653367" defer="defer" async="async"></script>
			<div class="contact-bottom">
					<div class="col-md-4 contact-left">
						<h4>Sed dapibus nunc eu metus commodo, et dictum justo fermentum.</h4>
						<p>Aliquam quis lacus at sapien tempor semper. Sed ultrices et metus et elementum. Nunc sed justo at erat consequat mollis et eu lectus.</p>
						<div class="address">
							<h4>Address</h4>
							<p>The company name, 
							<span>Lorem ipsum dolor,</span>
							Glasglow Dr 40 Fe 72.</p>
						</div>
					</div>	
					<div class="col-md-8 contact-right">
					<form method="POST" action="{{route('contact')}}">
					     {{ csrf_field() }}
						<input placeholder="Name" type="text" name="name" required>
						<input placeholder="Email" type="text" name="email" required>
						<textarea placeholder="Message" name="message" required></textarea>
					   <div class="submit-btn">
								<form>
									<input type="submit" value="POST">
								</form>
							</div>
									
								</form>
							
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!----end-contact---->
    @endsection