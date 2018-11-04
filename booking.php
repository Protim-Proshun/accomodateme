<?php
  include("db.php");
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Accomodate Me</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app2.css">
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
            <!-- <li><a href="http://localhost/project/booking.php">Book Hotel</a></li> -->
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

  <?php
    $con = mysqli_connect('localhost','root','','hotel');
    if(isset($_POST['submit'])){
      $reservedroom = $_POST['reservedroom'];
      $id = $_POST['id'];
      $room = 200 - $reservedroom;

      $query = "UPDATE owner SET ";
      $query.= "availableroom = '$room', "
      $query.= "reservedroom = '$reservedroom' ";
      $query.= "WHERE id = $id";
      //echo $query;
      $result = mysqli_query($con,$query);
    }
    // if(isset($_POST['submit'])){
    //   $name=$_POST['name'];
    //   $password=$_POST['password'];
    //   $email=$_POST['email'];
    //
    //   $query = "UPDATE customer SET ";
    //   $query.= "name = '$name', ";
    //   $query.= "password = '$password', ";
    //   $query.= "email = '$email' ";
    //   $query.= "WHERE id = $id";
    //   //echo $query;
    //   $result = mysqli_query($con,$query);
    // }
  ?>

  <div class="container">
    <fieldset>
      <legend>Book Hotel</legend>
      <form action="booking.php" method="post">
        <table>
          <tr>
            <td>Hotel ID</td>
            <td>:</td>
            <td><input type="number" name="id"></td>
          </tr>
          <tr>
            <td>Number of rooms</td>
            <td>:</td>
            <td><input type="number" name="reservedroom"></td>
          </tr>
          <tr>
            <td><input type="submit" name="submit"></td>
          </tr>
        </table>
      </form>
    </fieldset>
  </div>

  <?php include("footer.php") ?>
