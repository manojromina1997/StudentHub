<!--Fixed Navigation Bar-->
<script>
$(document).ready(function() {
var stickyNavTop = $('.nav').offset().top;
 
var stickyNav = function(){
var scrollTop = $(window).scrollTop();
      
if (scrollTop > stickyNavTop) { 
    $('.nav').addClass('sticky');
} else {
    $('.nav').removeClass('sticky'); 
}
};
 
stickyNav();
 
$(window).scroll(function() {
  stickyNav();
});
});
</script>
<!--Fixed Navigation Bar-->
<!--header-top-starts-->
	<div class="header-top">
		<div class="container">

		   <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
                        
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
								    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
								  <li><a href="{{route('profile')}}"><i class="fa fa-btn fa-user"></i> Profile</a></li>
                                <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                           <i class="fa fa-btn fa-sign-out"></i>  Logout</a></li>
							  
                                        

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }} 
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>

		</div>
	</div>
	                 <!-- Authentication Links End  -->
	<!--header-top-end-->
	<!--start-header-->
<div class="nav" style="font-size:15px ;font-weight:600">
	<div class="header">
		<div class="container">
			<div class="head">
			<div class="navigation">
				 <span class="menu"></span> 
					<ul class="navig">
					 @if (Auth::guest())
						<li><a href="{{route('home')}}" >StudentHub</a></li>						
                        <li><a href="{{route('posts.index')}}">Blog</a></li>
						<li><a href="{{route('projects.index')}}">Project</a></li>
						<li><a href="{{route('forums.index')}}">Forum</a></li>
						<li><a href="{{route('chat')}}">Chat</a></li>
                        <li><a href="{{route('aboutus')}}">About</a></li>
						<li><a href="{{route('contactus')}}">Contact</a></li>
					@else
						<li><a href="{{route('home')}}" >StudentHub</a></li>
						  <li><a href="{{route('profile')}}">Profile</a></li>						
                        <li><a href="{{route('posts.index')}}">Blog</a></li>
						<li><a href="{{route('projects.index')}}">Project</a></li>
						<li><a href="{{route('forums.index')}}">Forum</a></li>
						<li><a href="{{route('chat')}}">Chat</a></li>
                        <li><a href="{{route('aboutus')}}">About</a></li>
						<li><a href="{{route('contactus')}}">Contact</a></li>
					</ul>
					@endif
			</div>
			<div class="header-right">
				<div class="search-bar">

				
					<form action="{{route('search')}}" method="post">
					     {{ csrf_field() }}
					<input type="text" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">
					{{csrf_field()}}
							</form>
				</div>
			</div>
				<div class="clearfix"></div>
			</div>
			</div>
		</div>	
        </div>
		</div>