<style>

div{
position :relative;
color: MidnightBlue;
top:20px;
left:20%;
font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
font-size: 18px;
font-style: normal;
font-variant: normal;
font-weight: 400;
line-height: 20px;
}


div1{
position :relative;
color: MidnightBlue;
top:20px;
left:3%;
font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
font-size: 18px;
font-style: normal;
font-variant: normal;
font-weight: 400;
line-height: 20px;
}

</style>
<?php
$hostname = "localhost"; // usually is localhost
$db_user = "root"; // change to your database password
$db_password = "Pass0013"; // change to your database password
$database = "myid"; // provide your database name
$db_table = "contact"; // your database table name
$db = mysqli_connect($hostname,$db_user,$db_password,$database);
$query = "SELECT id,firstname from contact ";
$resultqry = mysqli_query($db, $query);
while ($rowq = mysqli_fetch_assoc($resultqry)) 
{
	echo "<div1>";
	echo $rowq["firstname"];
	echo "</div1>";
	echo "&nbsp";echo "&nbsp";
	echo "<div>";
?>
	<a href="indexchat.php?id=<?php echo $rowq['id'] ?>">Chat</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
	
	echo "<br>";echo "<br>";
	echo "</div>";
}
?>