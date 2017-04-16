@extends('layouts.master')
@section('title')
StudentHub - LogIn
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

    <div class="main-content"><!--Main Content -->

        <!-- You only need this form and the form-login.css -->

        <form class="form-login" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
             {{ csrf_field() }}
          
        <div class="form-log-in-with-email"><!--Form Starting-->

            <div class="form-white-background"><!--Form White Background-->

                    <div class="form-title-row">
                        <h1>Log in</h1>
                    </div>

                 <div class="form-row{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>
                            <span>Email</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        </label>
                 </div>

                 <div class="form-row{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>
                            <span>Password</span>
                            <input id="password" type="password"  name="password" required>
                        </label>
                 </div>

                 <div class="form-row">
                      <button type="submit" class="btn btn-primary">
                                    Login
                      </button>
                </div>

            </div><!--Form White Background Starts-->

                <a href="{{ url('/password/reset') }}" class="form-forgotten-password">Forgotten password &middot;</a>
                <a href="{{ url('/register') }}" class="form-create-an-account">Create an account &rarr;</a>

        </div><!--Form Login Ends-->

         <div class="form-sign-in-with-social"><!--SOcial Network-->

                <div class="form-row form-title-row">
                    <span class="form-title">Sign in with</span>
                </div>

                <a href="{{ url('/auth/google') }}" class="form-google-button">Google</a>
                <a href="{{ url('/auth/facebook') }}" class="form-facebook-button">Facebook</a>
                <a href="{{ url('/auth/twitter') }}" class="form-twitter-button">Twitter</a>


         </div>

        </form><!--SOcial Network-->
 
    </div><!--Main Content-->
    <br>
    <br>
    @endsection