<?php
	include("header2.php");
  include("db.php");
	session_start();

?>

	<ul class="nav navbar-nav navbar-right">
    <?php
		if(isset($_SESSION['id'])){?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="admin.php">Admins</a></li>
          <li><a href="#">Owners</a></li>
          <li><a href="customer.php">Customers</a></li>
        </ul>
      </li>
			<li><a href="http://localhost/project/updateprofile.php">Update Profile</a></li>
			<li><a href="http://localhost/project/logout.php">LogOut</a></li>
		<?php } ?>
	</ul>
	</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
	</nav>


	<div class="container">
    <?php
      if(isset($_POST['submit'])){
        $id = $_POST['id'];

        if($id>=200001 && $id<=300000){
          $query="DELETE FROM owner ";
          $query.="WHERE id = $id";

          $result=mysqli_query($con,$query);
        }
        if($id>=300001 && $id<=400000){
          $query="DELETE FROM customer ";
          $query.="WHERE id = $id";

          $result=mysqli_query($con,$query);
        }

      }


    ?>
    <fieldset>
      <form action="delete.php" method="post">
        <legend><b>Delete User</b></legend>
          <br/>
          <table cellpadding="0" cellspacing="0">
            <tr>
              <td>ID</td>
              <td>:</td>
              <td><input type="number" name="id" placeholder="000000"></td>
            </tr>
            <tr>
              <td><input type="submit" name="submit"></td>
            </tr>
         </table>
    </form>
  </fieldset>
  </div>
<?php include("footer.php"); ?>
