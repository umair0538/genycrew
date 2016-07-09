<?php
$to = "hello@genycrew.io";
$subject = $_POST["name"];
$txt = $_POST["message"];
$txt = wordwrap($txt,70);
$headers = "From: ". $_POST["from"] . "\r\n";

mail($to,$subject,$txt,$headers);
header('Location: http://genycrew.io');
?>