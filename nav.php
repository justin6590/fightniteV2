<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="./index.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tournaments <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Find a Tournament</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Teams <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="./team.php">Create a Team</a></li>
          <li><a href="#">Find a Team</a></li>
        </ul>
      </li>
      <li><a href="#">Leaderboards</a></li>
      <li><a href="./login_page.php">Login / Register</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
  </div>
</nav>
</body>
</html>