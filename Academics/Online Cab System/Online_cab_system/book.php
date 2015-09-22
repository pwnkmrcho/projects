<?php
	session_start();
	$flag = 1;
	if($_POST[scity] == $_POST[dcity]){
		$flag = 0;
	} else if(empty($_POST[pickup_datetime])){
		$flag = 0;
	}
	if($flag == 0){
		#echo "data invalid<br>";
		$_SESSION["booking_check"]="You selected same source and destination cities. Please select different cities!!!";
		header('location:booking.php');
		#include 'booking.php';
		exit;
	} else { 
		$_SESSION["booking_check"]="";
		#echo "booking the cab<br>";
		$servername = "localhost";
		$username = "root";
		$password = "iitmandiur036";
		$dbname = "online_cab_system";
		$id = "";

		$db_con = mysqli_connect($servername, $username, $password, $dbname);
		if (!$db_con) {
	    	die("Connection failed: " . mysqli_connect_error());
		}
		
		mysqli_autocommit($db_con, false);

		class get_minimum_id extends SplMaxHeap
		{
			function compare($a,$b){
				if($a->priority != $b->priority)
					return $a->priority - $b->priority;
				else
					return $b->distance - $a->distance;
			}
		}

		$sql = 

		$sql = "SELECT `id` FROM `cab_categories` WHERE `name` = '$_POST[cab_category]'";
		$result = mysqli_query($db_con, $sql);
		$arr = mysqli_fetch_assoc($result);
		$cab_category = $arr["id"];
		
		$sql = "SELECT * FROM `synchronize` WHERE `booked` = 'false' AND `category_id` = '$cab_category'";

		if(mysqli_query($db_con, $sql)) {
			#echo "Selected unbooked cabs"."<br>";	
		}
		else {
			$flag=false;
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		#echo "inserting<br>";
		$result = mysqli_query($db_con, $sql);
		$heap = new get_minimum_id();
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$temp = new stdClass;
				$temp->id = $row["cab_id"];
				$temp->distance = $row["distance"];
				$temp->priority = $row["priority"];
				$heap->insert($temp);
			}
		}
		foreach($heap as $person) {
	    	$cab_id = $person->id;
	    	break;
	  	}

	  	$sql = "UPDATE `synchronize` SET `booked` = '1' WHERE `cab_id` = '$cab_id'";
	  	mysqli_query($db_con, $sql);
	  	session_start();
	  	#echo $cab_id." ".$_POST[scity]." ".$_POST[dcity]." ".$_SESSION["idd"]." end"."<br>";
	  	#echo $_POST[pickup_datetime];
	  	$session_idd=$_SESSION["idd"];
	  	#$sql = "INSERT INTO `booking`(`pickup_datetime`, `source_place`, `destination_place`, `cab_id`, `driver_id`, `passenger_id`, `active`) VALUES ('0000-00-00 00:00:00', '$_POST[scity]', '$_POST[dcity]', '$cab_id', '$cab_id', '$_SESSION["idd"]', '1')";
		$sql = "INSERT INTO `booking`(`pickup_datetime`, `source_place`, `destination_place`, `cab_id`, `driver_id`, `passenger_id`, `active`) VALUES ('$_POST[pickup_datetime]', '$_POST[scity]', '$_POST[dcity]', '$cab_id', '$cab_id', '$session_idd', '1')";
		#echo $sql;
		if(mysqli_query($db_con, $sql)) {
			#echo "cab booked"."<br>";
			$sql="SELECT * FROM `driver` WHERE `id` = '$cab_id'";
			$result=mysqli_query($db_con, $sql);
			$answer=mysqli_fetch_assoc($result);
			$driver_fname=$answer["fname"];
			$driver_lname=$answer["lname"];
			$driver_contact_no=$answer["contact_no"];
			$sql="SELECT * FROM `cab` WHERE `id` = '$cab_id'";
			$result=mysqli_query($db_con, $sql);
			$answer=mysqli_fetch_assoc($result);
			$cab_model_name=$answer["model_name"];
			$cab_registration_no=$answer["registration_no"];
			$cat=$answer["category_id"];
			$cab_fare=$answer["fare"];
			$cab_luggage=$answer["luggage"];
			$sql="SELECT * FROM `cab_categories` WHERE `id` = '$cat'";
			$result=mysqli_query($db_con, $sql);
			$answer=mysqli_fetch_assoc($result);
			$cab_category=$answer["name"];
			$user_email=$_SESSION["email"];
			$sql="SELECT * FROM `passenger` WHERE `email_id` = '$user_email'";
			$result=mysqli_query($db_con, $sql);
			$answer=mysqli_fetch_assoc($result);
			$user_fname=$answer["fname"];
			$user_lname=$answer["lname"];	
			$dt=$_POST[pickup_datetime]; 
		}
		else {
			$flag=false;
			echo "Error on booking cab: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_commit($db_con);
		mysqli_close($db_con);
	}
?>
<!DOCTYPE html>
<!-- saved from url=(0038)http://cybersecuritygame.tk/questions/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Cab Booked</title>
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

<div class="container">
	<div class="jumbotron">
	<div align="right"><u>
				<?php
					echo $_SESSION["email"];
				?></u><a href="logout.php"> logout</a>
	</div>
	<h2><center>Cheers!! Cab is booked!!!<center></h2>
		<div id="box">
			<h3>Please collect the receipt...</h3><br>
			<b>Passenger name      : </b><?php echo $user_fname."&nbsp".$user_lname;?><br>
			<b>Pickup place: </b><?php echo $_POST["scity"]; ?><br>
			<b>Destination place : </b><?php echo $_POST[dcity];?><br>
			<b>Driver name      : </b><?php echo $driver_fname."&nbsp".$driver_lname;?><br>
			<b>Driver Contact no : </b><?php echo $driver_contact_no;?><br>
			<b>Cab Category : </b><?php echo $cab_category;?><br>
			<b>Cab Model Name : </b><?php echo $cab_model_name;?><br>
			<b>Cab Registration Number : </b><?php echo $cab_registration_no;?><br>
			<b>Cab Fare per kilometer : </b><?php echo $cab_fare;?><br>
			<b>Cab Luggage Space (big bags): </b><?php echo $cab_luggage;?><br>
			<b>Pickup Date-time(yyyy-mm-dd hh-mm-AM/PM): </b><?php echo $dt;?><br>
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