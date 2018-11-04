<?php
	include("header2.php");
	session_start();

?>

	<ul class="nav navbar-nav navbar-right">
		<?php
		if(isset($_SESSION['id'])){
			$id=$_SESSION['id'];
			if($id>=100001 && $id<=200000)
			{ ?>
				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="admin.php">Admins</a></li>
            <li><a href="owner.php">Owners</a></li>
            <li><a href="customer.php">Customers</a></li>
          </ul>
        </li>
				<li><a href="http://localhost/project/updateprofile.php">Update Profile</a></li>
				<li><a href="http://localhost/project/logout.php">LogOut</a></li>
			<?php }
			else if($id>=200001 && $id<=400000){ ?>

				<li><a href="http://localhost/project/updateprofile.php">Update Profile</a></li>
				<li><a href="http://localhost/project/logout.php">LogOut</a></li>
		<?php }
	}?>
	</ul>
	</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
	</nav>


	<div class="container">
<?php
			if(logged_in()){


				$logged_id = $_SESSION['id'];
				if($logged_id>=100001 && $logged_id<=200000){
					$sql = "SELECT * FROM admin WHERE id = '".escape($logged_id)."'";

					$result = query($sql);
					confirm($result);
					$row = fetch_array($result);
					?>
					<fieldset>
			        <legend><b>PROFILE</b></legend>
			    	<form>
			    		<br/>
			    		<table cellpadding="0" cellspacing="0">
								<tr>
			    				<td>ID</td>
			    				<td>:</td>
			    				<td><?=$row['id']; ?></td>
			    			</tr>
								<tr>
			    				<td>Name</td>
			    				<td>:</td>
			    				<td><?echo $row['name']; ?></td>
			    			</tr>
			    			<tr>
			    				<td>Email</td>
			    				<td>:</td>
			    				<td><?=$row['email']; ?></td>
			    			</tr>

			    		</table>
			      </form>
			    </fieldset>
				</div>
				<?php }
				else if($logged_id>=200001 && $logged_id<=300000){
					$sql = "SELECT * FROM owner WHERE id = '".escape($logged_id)."'";

					$result = query($sql);
					confirm($result);
					$row = fetch_array($result);
					?>
					<fieldset>
			        <legend><b>PROFILE</b></legend>
			    	<form>
			    		<br/>
			    		<table cellpadding="0" cellspacing="0">
								<tr>
			    				<td>ID</td>
			    				<td>:</td>
			    				<td><?=$row['id']; ?></td>
			    			</tr>
								<tr>
			    				<td>Name</td>
			    				<td>:</td>
			    				<td><?echo $row['name']; ?></td>
			    			</tr>
			    			<tr>
			    				<td>Email</td>
			    				<td>:</td>
			    				<td><?=$row['email']; ?></td>
			    			</tr>
								<tr>
			    				<td>Division</td>
			    				<td>:</td>
			    				<td><?=$row['division']; ?></td>
			    			</tr>
								<tr>
			    				<td>Hotel Name</td>
			    				<td>:</td>
			    				<td><?=$row['hotelname']; ?></td>
			    			</tr>
								<tr>
			    				<td>Hotel Address</td>
			    				<td>:</td>
			    				<td><?=$row['hoteladdress']; ?></td>
			    			</tr><tr>
			    				<td>Total Rooms</td>
			    				<td>:</td>
			    				<td><?=$row['totalroom']; ?></td>
			    			</tr>
								<tr>
			    				<td>Available Rooms</td>
			    				<td>:</td>
			    				<td><?=$row['availableroom']; ?></td>
			    			</tr>
								<tr>
			    				<td>Reserved Rooms</td>
			    				<td>:</td>
			    				<td><?=$row['reservedroom']; ?></td>
			    			</tr>

			    		</table>
			      </form>
			    </fieldset>
				</div>
				<?php }
				else if($logged_id>=300001 && $logged_id<=400000){
					$sql = "SELECT * FROM customer WHERE id = '".escape($logged_id)."'";

					$result = query($sql);
					confirm($result);
					$row = fetch_array($result);
					?>
					<fieldset>
			        <legend><b>PROFILE</b></legend>
			    	<form>
			    		<br/>
			    		<table cellpadding="0" cellspacing="0">
								<tr>
			    				<td>ID</td>
			    				<td>:</td>
			    				<td><?=$row['id']; ?></td>
			    			</tr>
								<tr>
			    				<td>Name</td>
			    				<td>:</td>
			    				<td><?echo $row['name']; ?></td>
			    			</tr>
			    			<tr>
			    				<td>Email</td>
			    				<td>:</td>
			    				<td><?=$row['email']; ?></td>
			    			</tr>

			    		</table>
			      </form>
			    </fieldset>
				</div>

				<?php  }
				// $sql = "SELECT * FROM users";

      }
?>
<?php include("footer.php"); ?>
