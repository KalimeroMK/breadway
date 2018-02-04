<?php
$name = (isset($_POST['name']) ? $_POST['name'] : '');
$ext = ".php";
$FileName = $name.$ext;
$myfile = fopen($FileName, "w") or die("Unable to open file!");
$txt = "<?require_once 'header.php'; 
require_once 'rss.php';?>\n";
fwrite($myfile, $txt);
$txt = "<?php
output_rss_feed('http://pravoslavie.mk/feed/', 20, true, true, 400);
require_once 'footer.php';?>\n";
fwrite($myfile, $txt);
fclose($myfile);



header('Location: ../addrss.php');

?>