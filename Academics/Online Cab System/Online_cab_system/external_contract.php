<!DOCTYPE html>
<!-- saved from url=(0038)http://cybersecuritygame.tk/questions/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Enter the Game</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    
<style type="text/css">
    body{
    	padding-top: 70px;
    }
    #box {
    width: 500px;
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
		<div align="right"><u>
				<?php
					session_start();
					echo $_SESSION["email"];
				?></u><a href="logout.php"> logout</a>
		</div>
		<center><h2> Welcome we are happy to make u a part of family...</h2></center>
		<div id="box">
			<h3>Fill the below form to give cabs on rent...</h3>
				<form method="post" action="external_contract_check.php">
				<select id="box_para" name="cab_category" required>
								<option value="" disabled selected>Cab type</option>
								<option value="Mini">Mini</option>
								<option value="Sedan">Sedan</option>
								<option value="SUV">SUV</option>
				</select>
				<input id="box_para" type="text" name="registration_no" placeholder="registration no" required>
				<br>
				<input id="box_para" type="text" name="model_name" placeholder="model name" required>
				<br>
				<input id="box_para" type="number" name="max_passenger_seats" placeholder="No of seats" required>
				<br>
				<select id="box_para" name="luggage" required>
								<option value="" disabled selected>Luggage space (bags)</option>
								<option value="2">2</option>
								<option value="4">4</option>
								<option value="6">6</option>
				</select>
				<br>
				<input id="box_button" type="submit" value="add cab">
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