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
