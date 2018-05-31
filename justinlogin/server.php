<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$teamname = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'fightnite');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		//Checking to see if user already exist
		$sql_u = "SELECT * FROM users WHERE username='$username'";
		$sql_e = "SELECT * FROM users WHERE email='$email'";
		$res_u = mysqli_query($db, $sql_u);
		$res_e = mysqli_query($db, $sql_e);

		if (mysqli_num_rows($res_u) > 0) {
			array_push($errors, "User already exists with this username"); 	
		}
		else if (mysqli_num_rows($res_e) > 0) {
		  	array_push($errors, "User already exists with this email"); 	
		}
		else {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			header('location: index.php');
		}
	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	// CREATING TEAM
	if (isset($_POST['create_team'])) {
		$teamname = mysqli_real_escape_string($db, $_POST['teamname']);

		if (empty($teamname)) {
			array_push($errors, "Team name is required");
		}

		//Checking to see if team already exist
		$sql_u = "SELECT * FROM teams WHERE teamname='$teamname'";
		$res_u = mysqli_query($db, $sql_u);

		if (mysqli_num_rows($res_u) > 0) {
			array_push($errors, "Team already exists"); 	
		}
		else {
			$query = "INSERT INTO teams (teamname) 
					  VALUES('$teamname')";
			mysqli_query($db, $query);

			$_SESSION['teamname'] = $teamname;
			$_SESSION['success'] = "Team Created";
			header('location: teamlist.php');
		}

	}

?>