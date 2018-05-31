<?php 
include('server.php');
include('nav.php');	
?>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center>
        <img src="images/fightnite-nav-logo.png" width="500px" length="300px">
    </center>
	<div class="header">
		<h3>Login</h3>
	</div>
	<center>
		<form method="post" action="login.php">

			<?php include('errors.php'); ?>

			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
			<p>
				Not yet a member? <a href="register.php">Sign up</a>
			</p>
		</form>
	</center>
</body>
</html>