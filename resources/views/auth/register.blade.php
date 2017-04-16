@extends('layouts.master')
@section('title')
StudentHub - Register
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
    <div class="main-content">

       

        <form class="form-register"  role="form" method="POST" action="{{ url('/register') }}">
 {{ csrf_field() }}
            <div class="form-register-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Create an account</h1>
                    </div>

                    <div class="form-row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>
                            <span>Name</span>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </label>
                    </div>

                    <div class="form-row{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>
                            <span>Email</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                              @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </label>
                    </div>

                    <div class="form-row{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>
                            <span>Password</span>
                            <input id="password" type="password" name="password" required>
                              @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </label>
                    </div>

                         <div class="form-row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label>
                            <span>Password Confirmation</span>
                            <input id="password-confirm" type="password" name="password_confirmation" required>
                              @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </label>
                    </div>

                    <div class="form-row">
                        <label class="form-checkbox">
                            <input type="checkbox" checked>
                            <span>I agree to the <a href="#">terms and conditions</a></span>
                        </label>
                    </div>

                  <div class="form-row">                            
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                        </div>
                </div>

                <a href="{{url('/login')}}" class="form-log-in-with-existing">Already have an account? Login here &rarr;</a>

            </div>
            <!--Form Ends-->

           <!--SOcial Network-->
            <div class="form-sign-in-with-social">

                 <div class="form-row form-title-row">
                    <span class="form-title">Sign in with</span>
                 </div>

                 <a href="{{ url('/auth/google') }}" class="form-google-button">Google</a>
                <a href="{{ url('/auth/facebook') }}" class="form-facebook-button">Facebook</a>
                <a href="{{ url('/auth/twitter') }}" class="form-twitter-button">Twitter</a>


            </div><!--SOcial Network-->
        
        </form>

    </div><!--main Content ends-->
<br>
@endsection
