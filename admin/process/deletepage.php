<?php
require_once '../conf/conf.php';
$id = $_POST['pageid'];

$delete = "DELETE FROM pages WHERE pageid = '$id'";
$execute = mysqli_query($con, $delete);
header('Location: ../addpage.php');
?>

