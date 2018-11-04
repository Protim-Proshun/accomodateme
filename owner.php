<?php
	include("header3.php");
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
    <br>
    <br>
    <br>
		<legend>List of Hotels:</legend>
    <table>
    	<tr>
    		<th>ID</th>
    		<th>Name</th>
    		<th>Password</th>
    		<th>Email</th>
    		<th>Division</th>
    		<th>Hotel Name</th>
    		<th>Hotel Address</th>
    		<th>Total Rooms</th>
    		<th>Available Rooms</th>
    		<th>Reserved Rooms</th>
    	</tr>
    	<tbody id="data">     <!-- data willl be displayed here -->

    	</tbody>
    </table>

    <script>
    	//call ajax
    	var ajax = new XMLHttpRequest();
    	var method = "GET";
    	var url = "data.php";
    	var asynchronous = true;

    	ajax.open(method,url,asynchronous);
    	//sending ajax request
    	ajax.send();

    	//receiving response from data.php
    	ajax.onreadystatechange = function()
    	{
    		if(this.readyState == 4 && this.status == 200)
    		{
    			//converting JSON back to array
          var data = JSON.parse(this.responseText);
          console.log(data); //for debugging

          //html value for <tbody>
          var html = "";
          for(var a=0;a<data.length;a++){
            var id = data[a].id;
            var name = data[a].name;
            var password = data[a].password;
            var email = data[a].email;
            var division = data[a].division;
            var hotelname = data[a].hotelname;
            var hoteladdress = data[a].hoteladdress;
            var totalroom = data[a].totalroom;
            var availableroom = data[a].availableroom;
            var reservedroom = data[a].reservedroom;

            //appending at html
            html += "<tr>";
              html += "<td>" + id + "</td>";
              html += "<td>" + name + "</td>";
              html += "<td>" + password + "</td>";
              html += "<td>" + email + "</td>";
              html += "<td>" + division + "</td>";
              html += "<td>" + hotelname + "</td>";
              html += "<td>" + hoteladdress + "</td>";
              html += "<td>" + totalroom + "</td>";
              html += "<td>" + availableroom + "</td>";
              html += "<td>" + reservedroom + "</td>";
            html += "</tr>"

          }

          document.getElementById("data").innerHTML = html;
    		}
    	}

    </script>

  </div>
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

		<br>
		<br>
		<br>
		<br>
    <fieldset>
      <form action="owner.php" method="post">
        <legend><h3><b>Delete User</h3></b></legend>
          <br/>
          <table cellpadding="0" cellspacing="0">
            <tr>
              <td bgcolor:Black>ID</td>
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

<?php include("footer.php") ?>
