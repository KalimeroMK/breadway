
<?php

require_once '../conf/conf.php';

$naslov = $_POST['naslov'];
$rte = $_POST['rte'];

$sql = "INSERT INTO tekstovi (naslov, rte) VALUES ('$naslov', '$rte')";
if (!mysqli_query($con, $sql)) {
	die('Error: ' . mysqli_error($con));
}

header('Location: ../addnews.php');

?>