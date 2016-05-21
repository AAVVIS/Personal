<html>
<body>
<?php
$hostname = "localhost"; // usually is localhost
$db_user = "root"; // change to your database password
$db_password = "Pass0013"; // change to your database password
$database = "myid"; // provide your database name
$db_table = "contact"; // your database table name
$db = mysqli_connect($hostname,$db_user,$db_password,$database);
$content = $_GET["try"];
session_start();
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 else
{
echo "yeah";
}
if($content != null)
{
mysqli_query($db,"INSERT INTO post VALUES ('{$_SESSION["user_id"]}','$_POST[post_id]','{$content}','0',NOW(),'4')");
}	
header("Location: Personal.php");
?>
</body>
</html>