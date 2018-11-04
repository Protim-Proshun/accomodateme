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
          <li><a href="owner.php">Owners</a></li>
          <li><a href="#">Customers</a></li>
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
		<legend>List of Customers:</legend>
    <table>
    	<tr>
    		<th>ID</th>
    		<th>Name</th>
    		<th>Password</th>
    		<th>Email</th>
    	</tr>
    	<tbody id="customerdata">     <!-- customerdata willl be displayed here -->

    	</tbody>
    </table>

    <script>
    	//call ajax
    	var ajax = new XMLHttpRequest();
    	var method = "GET";
    	var url = "customerdata.php";
    	var asynchronous = true;

    	ajax.open(method,url,asynchronous);
    	//sending ajax request
    	ajax.send();

    	//receiving response from customerdata.php
    	ajax.onreadystatechange = function()
    	{
    		if(this.readyState == 4 && this.status == 200)
    		{
    			//converting JSON back to array
          var customerdata = JSON.parse(this.responseText);
          console.log(customerdata); //for debugging

          //html value for <tbody>
          var html = "";
          for(var a=0;a<customerdata.length;a++){
            var id = customerdata[a].id;
            var name = customerdata[a].name;
            var password = customerdata[a].password;
            var email = customerdata[a].email;
            var division = customerdata[a].division;
            var hotelname = customerdata[a].hotelname;
            var hoteladdress = customerdata[a].hoteladdress;
            var totalroom = customerdata[a].totalroom;
            var availableroom = customerdata[a].availableroom;
            var reservedroom = customerdata[a].reservedroom;

            //appending at html
            html += "<tr>";
              html += "<td>" + id + "</td>";
              html += "<td>" + name + "</td>";
              html += "<td>" + password + "</td>";
              html += "<td>" + email + "</td>";
            html += "</tr>"

          }

          document.getElementById("customerdata").innerHTML = html;
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
      <form action="customer.php" method="post">
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

<?php include("footer.php") ?>
