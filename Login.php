<?php
$hostname = "localhost"; // usually is localhost
$db_user = "root"; // change to your database password
$db_password = "Pass0013"; // change to your database password
$database = "myid"; // provide your database name
$db_table = "contact"; // your database table name
$db = mysqli_connect($hostname,$db_user,$db_password,$database);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 else
{
echo "yeah";
}
session_start();
$sql1 = "SELECT id,firstname,password,lastname FROM contact WHERE email = '{$_SESSION["username"]}'";
$result1 = mysqli_query($db, $sql1);
while ($row = mysqli_fetch_assoc($result1)) {
    $_SESSION["user_id"] = $row["id"];
    $_SESSION["firstname"] = $row["firstname"];
    $_SESSION["password"] = $row["password"];
    $_SESSION["try"] = $row["lastname"];
}
header("location:posts.php");
		
?>