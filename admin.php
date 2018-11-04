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
          <li><a href="#">Admins</a></li>
          <li><a href="owner.php">Owners</a></li>
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
		<legend>List of Admins:</legend>
    <table>
    	<tr>
    		<th>ID</th>
    		<th>Name</th>
    		<th>Password</th>
    		<th>Email</th>
    	</tr>
    	<tbody id="admindata">     <!-- admindata willl be displayed here -->

    	</tbody>
    </table>

    <script>
    	//call ajax
    	var ajax = new XMLHttpRequest();
    	var method = "GET";
    	var url = "admindata.php";
    	var asynchronous = true;

    	ajax.open(method,url,asynchronous);
    	//sending ajax request
    	ajax.send();

    	//receiving response from admindata.php
    	ajax.onreadystatechange = function()
    	{
    		if(this.readyState == 4 && this.status == 200)
    		{
    			//converting JSON back to array
          var admindata = JSON.parse(this.responseText);
          console.log(admindata); //for debugging

          //html value for <tbody>
          var html = "";
          for(var a=0;a<admindata.length;a++){
            var id = admindata[a].id;
            var name = admindata[a].name;
            var password = admindata[a].password;
            var email = admindata[a].email;
            var division = admindata[a].division;
            var hotelname = admindata[a].hotelname;
            var hoteladdress = admindata[a].hoteladdress;
            var totalroom = admindata[a].totalroom;
            var availableroom = admindata[a].availableroom;
            var reservedroom = admindata[a].reservedroom;

            //appending at html
            html += "<tr>";
              html += "<td>" + id + "</td>";
              html += "<td>" + name + "</td>";
              html += "<td>" + password + "</td>";
              html += "<td>" + email + "</td>";
            html += "</tr>"

          }

          document.getElementById("admindata").innerHTML = html;
    		}
    	}

    </script>

  </div>

<?php include("footer.php") ?>
