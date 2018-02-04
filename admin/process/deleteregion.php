
<?php
require_once '../conf/conf.php';

$id = $_POST['reon'];

$delete = "DELETE FROM region WHERE reg_id = '$id'";
$execute = mysqli_query($con, $delete);

header('Location: /dodadireon.php');
?>
