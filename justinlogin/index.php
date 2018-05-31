<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

	include('nav.php');	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center>
        <img src="images/fightnite-nav-logo.png" width="500px" length="300px">
    </center>
	<div class="header">
		<h3>Home Page</h3>
	</div>
	<center>
		<div class="content">

			<!-- logged in user information -->
			<?php  if (!isset($_SESSION['username'])) : ?>
				<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
				<p><a href="logout.php" class="btn btn-danger">Log Out</a></p>
			<?php endif ?>
		</div>
	</center>
		
</body>
</html>