<html>
<style>

div{
position :relative;
color: MidnightBlue;
top:20px;
left:13%;
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
top:0px;
left:0%;
font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
font-size: 18px;
font-style: normal;
font-variant: normal;
font-weight: 400;
line-height: 20px;
}

div2{
position :relative;
color: black;
top:20px;
left:15%;
font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
font-size: 18px;
font-style: normal;
font-variant: normal;
font-weight: 400;
line-height: 20px;
}

.box{
        border: 1px solid #aaa; /*getting border*/
        border-radius: 4px; /*rounded border*/
        color: #000; /*text color*/
}

form input[type="submit"] {
    background: none;
    border: none;
    position:relative;
    left : 30%;
    color: MidnightBlue;
    cursor: pointer;
    font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
	font-size: 18px;
	font-style: normal;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:  MidnightBlue;
}

li {
    float: left;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: Navy;
}

.dropdown {
    position: relative;
    left:0%;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color:#808080;
    color:FloralWhite;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
}

.dropdown:hover .dropdown-content {
    display: block;	
}

</style>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
<div1>     
   <ul>
  <li><a class="active" href="Personal.php">Home</a></li>
  <li><a href="Timeline.php"><?php echo $_SESSION["firstname"] ?></a></li>
  <li><a href="AccountSettings.php">Account Settings</a></li>
</ul>
</div1>
    </body>
</html>


<body>
<?php

$hostname = "localhost"; // usually is localhost
$db_user = "root"; // change to your database password
$db_password = "Pass0013"; // change to your database password
$database = "myid"; // provide your database name
$db_table = "contact"; // your database table name
$db = mysqli_connect($hostname,$db_user,$db_password,$database);
$sql = "SELECT id,post_id,content,likes FROM post where id = '{$_SESSION["user_id"]}'";
$result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_assoc($result)) 
{
	echo "<div>"; 
	$sql1 = "SELECT firstname FROM contact WHERE id='{$row["id"]}' ";
	$result1 = mysqli_query($db, $sql1);
	while ($row1 = mysqli_fetch_assoc($result1)) 
	{
	echo $row1["firstname"];
	}
	echo "<br>";echo "&nbsp";echo "&nbsp";echo "&nbsp";
	echo "</div>"; 
	echo "<div2>";
	echo $row["content"];
	echo "<br>";echo "<br>";

?>
<!DOCTYPE html>
<html>
<body>
<a href="Like.php?id=<?php echo $row['id'] ?> & post_id=<?php echo $row['post_id'] ?>">Like</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="Comment.php?id=<?php echo $row['id'] ?>">Comment</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="Share.php?id=<?php echo $row['id'] ?> & post_id=<?php echo $row['post_id'] ?>">Share</a>
</body>
</html>
<?php
	echo "<br>";
?>
<html>
<body>

<div class="dropdown">
  <span><p><a href =""><?php echo $row["likes"];echo "&nbsp";echo "&nbsp";echo "people liked this";echo "<br>";?></a></p>&nbsp; 
</span>
  <div class="dropdown-content">

<?php
$sql2 = "SELECT id FROM liked_post where post_id='{$row["post_id"]}' AND liked = 1";
$result2 = mysqli_query($db, $sql2);
while ($row2 = mysqli_fetch_assoc($result2)) 
{

	$sql3 = "SELECT firstname FROM contact WHERE id = '{$row2["id"]}'";
	$result3 = mysqli_query($db, $sql3);
	while ($row3 = mysqli_fetch_assoc($result3)) 
	{
		echo $row3["firstname"];
		echo "<br>";
	}
}
?>
  </div>
</div>


</body>
</html>
<?php
	
	echo "</div2>";
}
?>

<?php
$sql2 = "SELECT shared_id,post_id,likes FROM share WHERE id = '{$_SESSION["user_id"]}'";
$result2 = mysqli_query($db, $sql2);
while ($row2 = mysqli_fetch_assoc($result2)) 
{
	echo "<div>"; 
	$sql5 = "SELECT firstname FROM contact WHERE id='{$_SESSION["user_id"]}' ";
	$result5 = mysqli_query($db, $sql5);
	while ($row5 = mysqli_fetch_assoc($result5)) 
	{
	echo $row5["firstname"];echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";
	}
	echo "shared";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";
	$sql3 = "SELECT firstname FROM contact WHERE id='{$row2["shared_id"]}' ";
	$result3 = mysqli_query($db, $sql3);
	while ($row3 = mysqli_fetch_assoc($result3)) 
	{
	echo $row3["firstname"];echo " 's";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "post";
	}
	echo "<br>";echo "&nbsp";echo "&nbsp";echo "&nbsp";
	echo "</div>"; 
	$sql4 = "SELECT content FROM post WHERE post_id='{$row2["post_id"]}' ";
	$result4 = mysqli_query($db, $sql4);
	while ($row4 = mysqli_fetch_assoc($result4)) 
	{
	echo "<div2>";
	echo $row4["content"];
	echo "<br>";echo "<br>";
	}
	
?>

<!DOCTYPE html>
<html>
<body>
<div3>
<a href="Like.php?id=<?php echo $row2['id'] ?> & post_id=<?php echo $row2['post_id'] ?>">Like</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="Comment.php?id=<?php echo $row2['id'] ?>">Comment</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="Share.php?id=<?php echo $row2['id'] ?> & post_id=<?php echo $row2['post_id'] ?>">Share</a>
</div3>
</body>
</html>
<?php
	echo "<br>";echo "<br>";
?>
<html>
<body>
<a href =""><?php echo $row2["likes"];echo "&nbsp";echo "&nbsp";echo "people liked this";?></a>;
</body>
</html>
<?php
	echo "<br>";echo "<br>";echo "<br>";
	echo "</div2>";
}
?>





</body>

</html>


