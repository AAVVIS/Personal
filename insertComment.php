<?php
$hostname = "localhost"; // usually is localhost
$db_user = "root"; // change to your database password
$db_password = "Pass0013"; // change to your database password
$database = "myid"; // provide your database name
$db_table = "contact"; // your database table name
$db = mysqli_connect($hostname,$db_user,$db_password,$database);
session_start();
echo "{$_SESSION["post_id"]}";
echo "{$_POST['comment']}";
$insert=mysqli_query($db,"INSERT INTO comment VALUES ('{$_SESSION["user_id"]}','{$_SESSION["post_id"]}','{$_POST["comment_id"]}','{$_POST["comment"]}') ");
header("Location: Personal.php");
?>