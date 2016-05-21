<?php
session_start();
$hostname = "localhost"; // usually is localhost
$db_user = "root"; // change to your database password
$db_password = "Pass0013"; // change to your database password
$database = "myid"; // provide your database name
$db_table = "contact"; // your database table name
$db = mysqli_connect($hostname,$db_user,$db_password,$database);
$_SESSION["shared_id"] = "{$_GET['id']}";
$_SESSION["shared_post_id"] = "{$_GET['post_id']}";
mysqli_query($db,"INSERT INTO share VALUES ('{$_SESSION["user_id"]}','{$_SESSION["shared_id"]}','{$_SESSION["shared_post_id"]}','0')");
header("Location: Personal.php");
?>