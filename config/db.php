<?php

// Create connection
$con = mysqli_connect("localhost", "ogledalo", "simeon08", "breadway");
// za kirilica od baza
mysqli_query($con, "SET NAMES UTF8");
// Check connection
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>