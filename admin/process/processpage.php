
<?php

require_once '../conf/conf.php';

$pagetitle = $_POST['pagetitle'];
$rte = $_POST['rte'];

$sql = "INSERT INTO pages (pagetitle, pagerte) VALUES ('$pagetitle', '$rte')";
if (!mysqli_query($con, $sql)) {
	die('Error: ' . mysqli_error($con));
}

header('Location: ../addpage.php');

?>