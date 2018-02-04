<?php require_once '../conf/conf.php'; ?>
<?php

$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$naslov = $_POST['naslov'];
$tip = $_POST['tip'];
$address = $_POST['address'];
$date = $_POST['date'];
$cena = $_POST['cena'];
$slika = $_POST['slika'];
$slika_large = $_POST['slikathumb'];
$rte = $_POST['rte'];



$sql = "INSERT INTO meni (name, address, type, date, slika, slika_large, cena, rte) 
VALUES ('$naslov', '$address','$tip','$date','$slika','$slika_large','$cena','$rte')";
if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

header('Location: /');
?>
