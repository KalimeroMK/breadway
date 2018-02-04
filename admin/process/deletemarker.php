<?php require_once '../conf/conf.php'; ?>
<?php
$id = $_POST['id'];



// Check connection
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$delete = "DELETE FROM tekst WHERE id = '$id'";
$execute = mysqli_query($con, $delete);

header('Location: /pregled.php');
?>
