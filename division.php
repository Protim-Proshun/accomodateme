<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Accomodate Me</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app.css">
  </head>
  <body>

    <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Accomodate Me</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="http://localhost/project/home.php">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
          if(isset($_SESSION['id']))
          { ?>
            <li><a href="http://localhost/project/booking.php">Book Hotel</a></li>
            <li><a href="http://localhost/project/profile.php">Profile</a></li>
            <li><a href="http://localhost/project/logout.php">LogOut</a></li>
          <?php }else{ ?>
            <li><a href="http://localhost/project/registration.php">Register</a></li>
            <li><a href="http://localhost/project/login.php">Login</a></li>
          <?php } ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-md-4">
        <a href="dhaka.php" class="thumbnail">
          <img src="image/dhaka.jpg" alt="">
          <h4>Dhaka</h4>
        </a>
      </div>
      <div class="col-xs-6 col-md-4">
        <a href="chittagong.php" class="thumbnail">
          <img src="image/chittagong.jpg" alt="">
          <h4>Chittagong</h4>
        </a>
      </div>
      <div class="col-xs-6 col-md-4">
        <a href="sylhet.php" class="thumbnail">
          <img src="image/sylhet.jpg" alt="">
          <h4>Sylhet</h4>
        </a>
      </div>
      <div class="col-xs-6 col-md-4">
        <a href="rajshahi.php" class="thumbnail">
          <img src="image/rajshahi.jpg" alt="">
          <h4>Rajshahi</h4>
        </a>
      </div>
    </div>
  </div>

<?php include("footer.php") ?>
