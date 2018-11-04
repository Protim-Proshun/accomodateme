<?php

//getting data from database
$conn = mysqli_connect("localhost","root","","hotel");

//getting data from owner table

$result = mysqli_query($conn, "SELECT * FROM owner WHERE division = 'Dhaka' ");

//storing in array

$data = array();
while($row = mysqli_fetch_assoc($result))
{
  $data[] = $row;
}

//returning response in JSON format

echo json_encode($data);

?>
