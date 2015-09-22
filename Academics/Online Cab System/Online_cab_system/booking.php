<?php
	session_start();
	if(isset($_SESSION["user"])) {
	}
	else{
		header("Location: login.php");
		exit;
	}
?>
<!DOCTYPE html>
<!-- saved from url=(0038)http://cybersecuritygame.tk/questions/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Booking</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    
<style type="text/css">
    body{
    	padding-top: 70px;
    }
    #box {
    width: 600px;
    padding: 0px;
    //border: 5px solid gray;
    margin: 0;
	}
	#box_para {
    width: 200px;
	}
	#box_button{
	width: 70px;	
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
					<a class="navbar-brand" href="booking.php"> <p>Online Cab System</p>  <h> </h>  </a>
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
					echo $_SESSION["email"];
				?></u><a href="logout.php"> logout</a>
	</div>
	<div align="center"><h2>
		PTH Online Cab booking</h2><br><br>
	</div>
		<div id="box">
			<form method="post" action="search.php">
				<input type="text" id="box_para" name="search" placeholder="type cab model name to search">&nbsp&nbsp
				<input id="box_button" type="submit" value="search">
			</form>
		</div>
		<div id="box">
			<div><i>
				<?php
					echo $_SESSION["booking_check"];
				?></i>
			</div>
			<h3>Please fill in the following details!!!</h3><br>	
			<form method="post" action="book.php">
				<select id="box_para" name="scity" required>
								<option value="" disabled selected>Pickup city</option>
								<option value="delhi">Delhi</option>
								<option value="mandi">Mandi</option>
								<option value="chandigarh">Chandigarh</option>
								<option value="manali">Manali</option>
				</select>
				<br>
				<select id="box_para" name="dcity" required>
								<option value="" disabled selected>Destination city</option>
								<option value="delhi">Delhi</option>
								<option value="mandi">Mandi</option>
								<option value="chandigarh">Chandigarh</option>4
								<option value="manali">manali</option>
				</select>
				<br>
				<select id="box_para" name="cab_category" required>
								<option value="" disabled selected>Cab type</option>
								<option value="Mini">Mini</option>
								<option value="Sedan">Sedan</option>
								<option value="SUV">SUV</option>
				</select>
				<br>
				<select id="box_para" name="luggage" required>
								<option value="" disabled selected>Luggage space (bags)</option>
								<option value="2">2</option>
								<option value="4">4</option>
								<option value="6">6</option>
				</select>
				<br>
				<input id="box_para" type="datetime-local" name="pickup_datetime" placeholder="Pickup date-time: yyyy-mm-dd hh:mm:AM/PM" required>
				<br><br>
				<input id="box_button" type="submit" value="book">
				<br>
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