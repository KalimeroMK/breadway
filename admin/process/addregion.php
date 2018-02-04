<?php require_once '../conf/conf.php'; ?>
<?php

$name = $_POST['reon'];
$youtb = $_POST['youtube'];
$p_url = parse_url($youtb);
parse_str($p_url['query'], $p_param);
$youtube = $p_param['v'];
$rte = $_POST['rte'];


$sql = "INSERT INTO region (region_name, reg_youtube, reg_rte) VALUES ('$name','$youtube', '$rte')";
if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

header('Location: /dodadireon.php');
?>
