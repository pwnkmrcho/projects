<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "iitmandiur036";
	$dbname = "online_cab_system";
	$id = $_SESSION["idd"];

	$db_con = mysqli_connect($servername, $username, $password, $dbname);
	if (!$db_con) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM `synchronize` WHERE `cab_id` = '$_SESSION[idd]'";
	$result = mysqli_query($db_con, $sql);
	$temp = mysqli_fetch_assoc($result);
	$synchronize_id = $temp["id"];
	$sql = "SELECT `booked` FROM `synchronize` WHERE `cab_id` = '$id'";
	$result = mysqli_query($db_con, $sql);
	$temp = mysqli_fetch_assoc($result);
	$status = $temp["booked"];
?>
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

<div class="container">
	<div class="jumbotron">
		<div align="right"><u>
				<?php
					echo $_SESSION["email"];
				?></u><a href="logout.php"> logout</a>
		</div>
		<center><h2> Welcome...</h2></center>
		<br><br>
		<div id="box">
			<h3>Bookings:</h3>
			<?php
				if($status!='0'){ ?>
				You have an ongoing journey. Click here to 
				<form method="post" action="finish_journey.php">
					<input id="box_button" type="submit" value="finish journey">
				</form>
			<?php } else { ?>
				You have no ongoing journey.
			<?php } ?>
		</div>
	</div>
<hr>
	<div class="row">
		<div class="col-xs-12">
			<footer>
				<p>© 
				<? elsePHT Online Cab System </p>
			</footer>
		</div>
	</div>
</div>


</body></html>