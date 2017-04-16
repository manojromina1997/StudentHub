<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> 
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>

<!--CSS LInk Starts -->
<link href="/css/form-register.css" rel='stylesheet' type='text/css' />
<link href="/css/form-login.css" rel='stylesheet' type='text/css' />
<link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="/css/style.css" rel='stylesheet' type='text/css' />
<!--CSS link Ends -->

<script src="/js/jquery.min.js"></script>

<!--Icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<!--Icon-->

<!--Bootstrap-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <!--Bootstrap--> 

<!--Toastr js -->
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<!--Toastr js -->


<!--Form Validation -->
<script src="parsley.min.js"></script>
<!--Form Validation -->

</head>
<body>
<!--Headers-->
@include('includes.header')
<!--HEaders-->

<!--@include('includes.alerts')	-->
@include('includes.notifications')


<div class="mainbody">
@yield('content')
</div>

@include('includes.footer')	

</body>
</html>

