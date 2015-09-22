<?php
	$servername = "localhost";
	$username = "root";
	$password = "iitmandiur036";
	$dbname = "online_cab_system";
	

	$db_con = mysqli_connect($servername, $username, $password, $dbname);
	if (!$db_con) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM `cab` WHERE `model_name` = '$_POST[search]'";
	$result = mysqli_query($db_con, $sql);
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
    width: 450px;
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
		<h2>Your search results...</h2>
		<div id="box">
			<?php
				$i=1;
				echo "<b>S.No&nbsp&nbspRegistration No &nbsp&nbsp Model Name &nbsp&nbsp Seats available &nbsp&nbsp fare/km</b><br>";
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						#echo "hi";
						echo $i."&nbsp&nbsp".$row["registration_no"]."&nbsp&nbsp".$row["model_name"]."&nbsp&nbsp".$row["max_passenger_seats"]."&nbsp&nbsp".$row["fare"];?>
						<form method="post" action="search_check.php">
						&nbsp&nbsp<input type="submit" value="book now"><br>
						</form>
						<?php
					}
				}
			?>
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