<?php
session_start();

$teamname = "";
$captain_id = $_SESSION['user']['id']; 
$errors   = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'fightnite');

// Register the team
if (isset($_POST['reg_team'])) {
  // receive all input values from the form
  $teamname   = mysqli_real_escape_string($db, $_POST['teamname']);


  if (empty($teamname)) { array_push($errors, "teamname is required"); }

  // first check the database to make sure 
  // a team does not already exist with the same teamname
  $user_check_query = "SELECT * FROM teams WHERE teamname='$teamname' OR captain_id='$captain_id' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user  = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['teamname'] === $teamname) {
      array_push($errors, "teamname already exists");
    }
  }

  if (count($errors) == 0) {

  	$query = "INSERT INTO teams (teamname, captain_id) 
  			  VALUES('$teamname', '$captain_id')";
  	mysqli_query($db, $query);
  	$_SESSION['teamname'] = $teamname;
  	$_SESSION['http_response_code(code)'] = "Team created!";
  	header('location: /s/teamManage.php');
  }
}

?>