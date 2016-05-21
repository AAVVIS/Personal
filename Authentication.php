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
$_SESSION["username"] = "{$_POST["pers_uname"]}";
$_SESSION["password"] = "{$_POST["pers_pass"]}";
$myusername = $_SESSION["username"];
$mypassword = $_SESSION["password"];


 $sql = "SELECT * FROM $db_table WHERE email='$myusername' and password='$mypassword'";
    $result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);


if($count == 1){
    	 
    	header("location:Login.php");
    }
else{
	 header("Location:index.php");    	
    }
    
   
?>