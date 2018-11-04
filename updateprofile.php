<?php
	include("header2.php");
  include("db.php");
	include("init.php");
	session_start();

?>

	<ul class="nav navbar-nav navbar-right">
		<?php
		if(isset($_SESSION['id']))
		{ ?>
			<li><a href="http://localhost/project/profile.php">Profile</a></li>
			<li><a href="http://localhost/project/logout.php">LogOut</a></li>
		<?php } ?>
	</ul>
	</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
	</nav>


	<div class="container">
    <?php
      $id = $_SESSION['id'];
      //echo $id;
      if($id>=100001 && $id<=200000){
        if(isset($_POST['submit'])){
          $name=$_POST['name'];
          $password=$_POST['password'];
					$cpassword=$_POST['cpassword'];
          $email=$_POST['email'];

					if($password == $cpassword){
	          $query = "UPDATE admin SET ";
	          $query.= "name = '$name', ";
	          $query.= "password = '$password', ";
	          $query.= "email = '$email' ";
	          $query.= "WHERE id = $id";
	          //echo $query;
	          $result = mysqli_query($con,$query);
					}
					else{
						echo "Your password didn't match";
					}
        }

      ?>
      <form action="updateprofile.php" method="post">
				<?php $sql = "SELECT * FROM admin WHERE id = '".$_SESSION['id']."'";

				$result = query($sql);
				confirm($result);
				$row = fetch_array($result);
				?>
        <br/>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <td>Name</td>
            <td>:</td>
            <td><input type="text" name="name" value=<?php echo $row['name']; ?> ></td>
          </tr>
          <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="password"></td>
          </tr>
					<tr>
            <td>Confirm Password</td>
            <td>:</td>
            <td><input type="password" name="cpassword"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" name="email" value=<?php echo $row['email']; ?>></td>
          </tr>
          <tr>
            <td><input type="submit" name="submit"></td>
          </tr>
        </table>
      </form>
    <?php }
    else if($id>=200001 && $id<=300000){
      if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
        $email=$_POST['email'];
        $hotelname=$_POST['hotelname'];
        $availableroom=$_POST['availableroom'];
        $reservedroom=$_POST['reservedroom'];


				if($password == $cpassword){
					$query = "UPDATE owner SET ";
	        $query.= "name = '$name', ";
	        $query.= "password = '$password', ";
	        $query.= "email = '$email', ";
	        $query.= "hotelname = '$hotelname', ";
	        $query.= "availableroom = '$availableroom', ";
	        $query.= "reservedroom = '$reservedroom' ";
	        $query.= "WHERE id = $id";
	        //echo $query;
	        $result = mysqli_query($con,$query);
				}
				else{
					echo "Your password didn't match";
				}
      }

    ?>
    <form action="updateprofile.php" method="post">
			<?php $sql = "SELECT * FROM owner WHERE id = '".$_SESSION['id']."'";

			$result = query($sql);
			confirm($result);
			$row = fetch_array($result);
			?>
      <br/>
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td>Name</td>
          <td>:</td>
          <td><input type="text" name="name" value=<?php echo $row['name']; ?>></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td><input type="password" name="password"></td>
        </tr>
				<tr>
          <td>Confirm Password</td>
          <td>:</td>
          <td><input type="password" name="cpassword"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><input type="email" name="email" value=<?php echo $row['email']; ?>></td>
        </tr>
        <tr>
          <td>Hotel Name</td>
          <td>:</td>
          <td><input type="text" name="hotelname" value=<?php echo $row['hotelname']; ?>></td>
        </tr>
        <tr>
          <td>Available Rooms</td>
          <td>:</td>
          <td><input type="number" name="availableroom" value=<?php echo $row['availableroom']; ?>></td>
        </tr>
        <tr>
          <td>Reserved Rooms</td>
          <td>:</td>
          <td><input type="number" name="reservedroom" value=<?php echo $row['reservedroom']; ?>></td>
        </tr>
        <br>
        <tr>
          <td><input type="submit" name="submit"></td>
        </tr>
      </table>
    </form>
  <?php }
  else if($id>=300001 && $id<=400000){
    if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $password=$_POST['password'];
      $email=$_POST['email'];
			$cpassword=$_POST['cpassword'];

			if($password == $cpassword){
				$query = "UPDATE customer SET ";
	      $query.= "name = '$name', ";
	      $query.= "password = '$password', ";
	      $query.= "email = '$email' ";
	      $query.= "WHERE id = $id";
	      //echo $query;
	      $result = mysqli_query($con,$query);
			}
			else{
				echo "Your password didn't match";
			}
    }

  ?>
  <form action="updateprofile.php" method="post">
		<?php $sql = "SELECT * FROM customer WHERE id = '".$_SESSION['id']."'";

		$result = query($sql);
		confirm($result);
		$row = fetch_array($result);
		?>
    <br/>
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input type="text" name="name" value=<?php echo $row['name']; ?>></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><input type="email" name="email" value=<?php echo $row['email']; ?>></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit"></td>
      </tr>
    </table>
  </form>
<?php } ?>
  </div>

<?php include("footer.php"); ?>
