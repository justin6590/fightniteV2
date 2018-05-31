<?php 
include('server.php');

// If session variable is not set it will redirect to login page
session_start(); 
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    }
?>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <center>
        <img src="images/fightnite-nav-logo.png" width="500px" length="300px">
    </center>
    <div class="header">
        <h3>Create Team</h3>
    </div>
    <center>
        <form method="post" action="team.php">

            <?php include('errors.php'); ?>

            <div class="input-group">
                <label>Name</label>
                <input type="text" name="teamname" value="<?php echo $teamname; ?>">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="create_team">Create</button>
            </div>
            <p>Looking to join a team? <a href="teamList.php">Look here</a>.</p>
        </form>
    </center>
</body>
</html>