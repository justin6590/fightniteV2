<?php
// Include config file
require_once 'config.php';
include 'nav.php';
 
// Define variables and initialize with empty values
$teamname = "";
$teamname_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate teamname
    if(empty(trim($_POST["teamname"]))){
        $username_err = "Please enter a teamname.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM teams WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This is already a team.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Check input errors before inserting in database
    if(empty($teamname_err)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO teams (name) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_teamname);
            
            // Set parameters
            $param_teamname = $teamname;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: teamList.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <center>
        <img src="images/fightnite-nav-logo.png" width="500px" length="300px">
    </center>
    <center>
        <div class="wrapper">
            <h2>Create Team</h2>
            <p>Please enter a team name.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($teamname_err)) ? 'has-error' : ''; ?>">
                    <label>Name</label>
                    <input type="text" name="teamname"class="form-control" value="<?php echo $teamname; ?>">
                    <span class="help-block"><?php echo $teamname_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>    
                <p>Looking to join a team? <a href="teamList.php">Look here</a>.</p>
            </form>
        </div> 
    </center>   
</body>
</html>