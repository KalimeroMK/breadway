<?php require_once '../conf/conf.php'; ?>

<?php

$naslov = $_POST['naslov'];
$date = $_POST['date'];
$rte = $_POST['rte'];
$slika = $_POST['slika'];
$slika_large = $_POST['slikathumb'];




    $sql = "INSERT INTO profesori (naslov, date, slika, slika_large, rte) VALUES ('$naslov', '$date', '$slika', '$slika_large', '$rte')";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    header('Location: /addnews.php');





?>
