<?php
session_start();
$hostname = "localhost"; // usually is localhost
$db_user = "root"; // change to your database password
$db_password = "Pass0013"; // change to your database password
$database = "myid"; // provide your database name
$db_table = "contact"; // your database table name
$db = mysqli_connect($hostname,$db_user,$db_password,$database);
$_SESSION["try_id"] = "{$_GET['id']}";
$_SESSION["try_post_id"] = "{$_GET['post_id']}";
echo "{$_SESSION["try_id"]}";
echo "{$_SESSION["try_post_id"]}";
mysqli_query($db,"INSERT INTO liked_post VALUES ('{$_SESSION["user_id"]}','{$_SESSION["try_post_id"]}','0')");
$sql1 = "SELECT liked FROM liked_post WHERE id='{$_SESSION["user_id"]}' AND post_id = '{$_SESSION["try_post_id"]}'";
$result = mysqli_query($db, $sql1);
while ($row = mysqli_fetch_assoc($result)) 
{
echo "Yeah";
if($row["liked"] == 0)
{
$sql = "UPDATE post SET likes = likes+1 WHERE id = '{$_SESSION["try_id"]}' AND post_id = '{$_SESSION["try_post_id"]}'" ;
mysqli_query($db, $sql);
mysqli_query($db, "UPDATE liked_post SET liked = 1 WHERE id='{$_SESSION["user_id"]}' AND post_id = '{$_SESSION["try_post_id"]}'");
}
}
header("Location: Personal.php");
?>