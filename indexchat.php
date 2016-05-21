<?php
session_start();
$_SESSION["frnd_id"] = "{$_GET['id']}";
echo $_SESSION["frnd_id"];
header("Location: index.html");
?>

