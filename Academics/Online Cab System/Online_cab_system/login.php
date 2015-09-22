<!DOCTYPE html>
<!-- saved from url=(0038)http://cybersecuritygame.tk/questions/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Welcome to Online Cab System</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    
<style type="text/css">
    body{
    	padding-top: 70px;
    }
    #box {
    width: 320px;
    padding: 0px;
    //border: 5px solid gray;
    margin: 0;
	}
	#box_para {
    width: 250px;
	}
	#box_button{
	width: 100px;	
	}
</style>
</head>

<body>

<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
				<div align="center">
					<a class="navbar-brand"> <p>Online Cab System</p>  <h> </h>  </a>
			</div>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="nav navbar-nav">
			</ul>
		</div>
	</div>
</nav>

<div class="container" align="center">
	<div class="jumbotron">
		<div id="box">
			<?php
					session_start();
					echo $_SESSION["login_error"];
			?>
			<h2>....Login here....</h2>
			<form method="post" action="login_check.php">
				<input id="box_para" type="email" name="email_id" placeholder="email id" required><?php #echo $login_email;?>
				<br>
				<input id="box_para" type="password" name="password" placeholder="******" required><?php #echo $login_pass;?>
				<br>
				<div id="box_para">
					<input type="radio" name="user" value="passenger" required>User
					<input type="radio" name="user" value="driver" required>Driver
					<input type="radio" name="user" value="external_owner" required>External owners<?php #echo $login_user;?>
				</div>
				<input id="box_button" type="submit" value="login">
				<br>
			</form>
		</div>
		<div id="box">
			<?php
					session_start();
					echo $_SESSION["signup_error"];
			?>
			<h2>....Signup here.....</h2>
			<form method="post" action="signup.php">
				<input id="box_para" type="text" name="fname" placeholder="first name" required>
				<br>
				<input id="box_para" type="text" name="lname" placeholder="last name" required>
				<br>
				<input id="box_para" type="email" name="email_id" placeholder="email id" required>
				<br>
				<input id="box_para" type="number" name="contact_no" placeholder="Contact no" required>
				<br>
				<input id="box_para" type="password" name="password" placeholder="******" required>
				<br>
				<input id="box_button" type="submit" value="sign up">
			</form>
		</div>
	</div>
<hr>
	<div class="row">
		<div class="col-xs-12">
			<footer>
				<p>© PHT Online Cab System </p>
			</footer>
		</div>
	</div>
</div>


</body></html>