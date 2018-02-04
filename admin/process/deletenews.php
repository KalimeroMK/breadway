<?php
require_once '../conf/conf.php';
$id = $_POST['news_id'];

$delete = "DELETE FROM profesori WHERE news_id = '$id'";
$execute = mysqli_query($con, $delete);
header('Location: ../addnews.php');
?>

