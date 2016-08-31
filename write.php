<?php
$fp = fopen('message.log','a');
$time = time();

$username = trim($_POST['username']);
$content = trim($_POST['content']);

$string = $username.'$#'.$content.'$#'.$time.'&&';

fwrite($fp,$string);

fclose($fp);
header('location:show.php');
?>