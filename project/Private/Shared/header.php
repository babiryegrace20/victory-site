<?php 
	// include ('server.php');
  // if (!isset($_SESSION['username'])) {
  //   $_SESSION['msg'] = "You must log in first";
  //   header('location: login.php');
  // }
   ?>

<!DOCTYPE html>
<html>
	<head>
		<title>
		<?php 
			if (isset($page_title)) {
				echo $page_title;
			} else {
				echo "Victory Farm";
			}
		?>
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/icomoon.css" rel="stylesheet" type="text/css">


		<!-- Bootstrap library
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

		<script src="bootstrap/js/bootstrap.min.js"></script> 

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->

		<link rel="stylesheet" href="bootstrap4\dist\css\bootstrap.min.css">
	  <script src="bootstrap4\js\tests\vendor\jquery-1.9.1.min.js"></script>
	  <script src="bootstrap4\assets\js\vendor\popper.min.js"></script>
	  <script src="bootstrap4\js\bootstrap.min.js"></script>



	       
	</head>
	<body class="img1">

		<header>
			<div class="container">
				<nav class="row">
					<a href="" class="logo"><img src="image/Capture.png" style="height: 5vw; width: 10vw; margin: 10px;"></a>
						<ul >
							<li><a href="index.php">Home</a></li>
							<li><a href="work.php">Work</a></li>
							<li><a href="blog.php">Blog</a></li>
							<li><a href="services.php">Services</a></li>
							<li><a href="members.php">Users</a></li>
							<li><a href="our_team.php">Our Team</a></li>
							<li><a href="contacts.php">Contacts</a></li>
							<li><a href="pictorial.php">Pictorial</a></li>
							<li><a href="index.php?logout='1'" id="nav_list" style="color: red; position:right;">logout</a></li>
						</ul>
				</nav>
			</div>
		</header>

		<div class="main_content">
		