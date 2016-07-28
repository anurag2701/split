<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign-Up/Login Form</title>
<link
	href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600'
	rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="login-assets/css/normalize.css">


<link rel="stylesheet" href="login-assets/css/style.css">




</head>

<body>
<?php // print_r ($_SERVER);?>

	@if(!Auth::check())
	<div class="form" id="tabs">

		<ul class="tab-group">
			<li class="tab active"><a href="#signup">Sign Up</a></li>
			<li class="tab"><a href="#login">Log In</a></li>
		</ul>

		<div class="tab-content">
			<div id="signup">
				<h1>Sign Up for Free</h1>
				
				@if (count($errors) > 0)
                <div class="alert alert-danger tab-content">
                	<strong>Whoops!</strong> There were some problems with your input.<br>
                	<br>
                	<ul>
                		@foreach ($errors->all() as $error)
                		<li>{{ $error }}</li> @endforeach
                	</ul>
                </div>
                @endif
				
				<form action="{{url('auth/register')}}" method="post">

					  {!! csrf_field() !!}
					
					<div class="field-wrap">
							<label> Full Name<span class="req">*</span>
							</label> <input type="text" name="name" required autocomplete="off" />
						</div>

					<div class="field-wrap">
						<label> Email Address<span class="req">*</span>
						</label> <input type="email" name="email" required autocomplete="off" />
					</div>
					
					<div class="field-wrap">
						<label> Mobile<span class="req">*</span>
						</label> <input type="mobile" name="mobile" required autocomplete="off" />
					</div>

					<div class="field-wrap">
						<label> Set A Password<span class="req">*</span>
						</label> <input type="password" name="password"  required autocomplete="off" />
					</div>
					
					<div class="field-wrap">
						<label> Confirm Password<span class="req">*</span>
						</label> <input type="password" name="password_confirmation"  required autocomplete="off" />
					</div>

					<button type="submit" class="button button-block" />
					Get Started
					</button>

				</form>

			</div>

			<div id="login">
				<h1>Welcome Back!</h1>
				@if (count($errors) > 0)
                <div class="alert alert-danger tab-content">
                	<strong>Whoops!</strong> There were some problems with your input.<br>
                	<br>
                	<ul>
                		@foreach ($errors->all() as $error)
                		<li>{{ $error }}</li> @endforeach
                	</ul>
                </div>
                @endif

				<form action="{{url('auth/login')}}" method="post">
					  {!! csrf_field() !!}
					<div class="field-wrap">
						<label> Email Address<span class="req">*</span>
						</label> <input type="email" name="email" required autocomplete="off" />
					</div>

					<div class="field-wrap">
						<label> Password<span class="req">*</span>
						</label> <input type="password" name="password"  required autocomplete="off" />
					</div>

					<p class="forgot">
						<a href="#">Forgot Password?</a>
					</p>

					<button class="button button-block" />
					Log In
					</button>

				</form>

			</div>

		</div>
		<!-- tab-content -->

	</div>

	@endif
	<!-- /form -->
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="login-assets/js/index.js"></script>
	




</body>
</html>
