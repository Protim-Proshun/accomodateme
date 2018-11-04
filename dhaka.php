<?php
  session_start();
  include ("functions/init.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Accomodate Me</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app3.css">
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

  <div class="container">
    <fieldset>
      <legend>Hotels of Dhaka</legend>
      <br>
      <br>
      <br>
      <table>
      	<tr>
      		<th>ID</th>
      		<!-- <th>Name</th>
      		<th>Password</th>
      		<th>Email</th> -->
      		<!-- <th>Division</th> -->
      		<th>Hotel Name</th>
      		<th>Hotel Address</th>
      		<!-- <th>Total Rooms</th> -->
      		<th>Available Rooms</th>
      		<!-- <th>Reserved Rooms</th> -->
      	</tr>
      	<tbody id="dhakadata">     <!-- dhakadata willl be displayed here -->

      	</tbody>
      </table>

      <script>
      	//call ajax
      	var ajax = new XMLHttpRequest();
      	var method = "GET";
      	var url = "dhakadata.php";
      	var asynchronous = true;

      	ajax.open(method,url,asynchronous);
      	//sending ajax request
      	ajax.send();

      	//receiving response from dhakadata.php
      	ajax.onreadystatechange = function()
      	{
      		if(this.readyState == 4 && this.status == 200)
      		{
      			//converting JSON back to array
            var dhakadata = JSON.parse(this.responseText);
            console.log(dhakadata); //for debugging

            //html value for <tbody>
            var html = "";
            for(var a=0;a<dhakadata.length;a++){
              var id = dhakadata[a].id;
              // var name = dhakadata[a].name;
              // var password = dhakadata[a].password;
              // var email = dhakadata[a].email;
              // var division = dhakadata[a].division;
              var hotelname = dhakadata[a].hotelname;
              var hoteladdress = dhakadata[a].hoteladdress;
              // var totalroom = dhakadata[a].totalroom;
              var availableroom = dhakadata[a].availableroom;
              // var reservedroom = dhakadata[a].reservedroom;

              //appending at html
              html += "<tr>";
                html += "<td>" + id + "</td>";
                // html += "<td>" + name + "</td>";
                // html += "<td>" + password + "</td>";
                // html += "<td>" + email + "</td>";
                // html += "<td>" + division + "</td>";
                html += "<td>" + hotelname + "</td>";
                html += "<td>" + hoteladdress + "</td>";
                // html += "<td>" + totalroom + "</td>";
                html += "<td>" + availableroom + "</td>";

              html += "</tr>"

            }

            document.getElementById("dhakadata").innerHTML = html;
      		}
      	}

      </script>

    </fieldset>
  </div>

  <?php
    if(isset($_POST['submit'])){
      $id = $_POST['id'];
      $sql = "SELECT * FROM owner WHERE id = '$id'";

      $result = query($sql);
      confirm($result);
      $row = fetch_array($result);
      $avail = $row['availableroom'];

      $reservedroom = $_POST['reservedroom'];

      $room = $avail - $reservedroom;

      $query = "UPDATE owner SET ";
      $query.= "availableroom = '$room', ";
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
  <?php
  if(isset($_SESSION['id']))
  { ?>
  <div class="container">
    <fieldset>
      <legend>Book Hotel</legend>
      <form action="dhaka.php" method="post">
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
<?php } ?>
</body>
