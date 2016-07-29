<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>App Name - @yield('title')</title>
<script	src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Lato:300,700'
	rel='stylesheet' type='text/css'>
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="css/normalize.css">


<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/ax5ui/ax5ui-dialog/master/dist/ax5dialog.css" />

<script type="text/javascript" src="https://cdn.rawgit.com/ax5ui/ax5core/master/dist/ax5core.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/ax5ui/ax5ui-dialog/master/dist/ax5dialog.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/ax5ui/ax5ui-mask/master/dist/ax5mask.css" />
<script type="text/javascript" src="https://cdn.rawgit.com/ax5ui/ax5ui-mask/master/dist/ax5mask.min.js"></script>


</head>

<body>
<?php 
    if(!Auth::check())
        return Redirect::to("/");
?>
	<nav class="nav">
		<div class="burger">
			<div class="burger__patty"></div>
		</div>

		<ul class="nav__list">
			<li class="nav__item"><a href="#1" class="nav__link c-blue"><i
					class="fa fa-camera-retro"></i></a></li>
			<li class="nav__item"><a href="#2" class="nav__link c-yellow scrolly"><i
					class="fa fa-bolt"></i></a></li>
			<li class="nav__item"><a href="#3" class="nav__link c-red"><i
					class="fa fa-music"></i></a></li>
			<li class="nav__item"><a href="#4" class="nav__link c-green"><i
					class="fa fa-paper-plane"></i></a></li>
			<li class="nav__item"><a href="{{url('auth/logout')}}" class="nav__link c-red" title="logout"><i
					class="fa fa-sign-out"></i></a></li>
		</ul>
	</nav>


	@yield('content')



	<a href="#"
		class="logo" target="_blank"> <img class="logo"
		src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/ettrics-logo.svg"
		alt="" />
	</a>
	

	<script src="js/index.js"></script>




</body>
</html>