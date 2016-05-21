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

div3{
position :relative;
color: grey;
top:20px;
left:0%;
font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
font-size: 18px;
font-style: normal;
font-variant: normal;
font-weight: 400;
line-height: 20px;
}

div4{
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

div5{
position :relative;
color: black;
top:20px;
left:5%;
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
    top :10%;
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
<div>
<a href="upload.php">Add Photos</a><br><br>
</div>
<form action="posts.php" name="Form">
<div>
<p1><?php echo $_SESSION["firstname"] ?></p1><br><br>
<textarea rows="10" cols="80" class="box" name="try"></textarea><br><br>
<input type="submit" value="Post" name="check_post"/>
</div>
</form>
<?php

$hostname = "localhost"; // usually is localhost
$db_user = "root"; // change to your database password
$db_password = "Pass0013"; // change to your database password
$database = "myid"; // provide your database name
$db_table = "contact"; // your database table name
$db = mysqli_connect($hostname,$db_user,$db_password,$database);
$sql = "SELECT id,post_id,content,created_at,type,likes FROM post UNION ALL SELECT id,name,image,created_at,type,likes FROM images ORDER BY created_at DESC";
$result = mysqli_query($db, $sql);
session_start();
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
	if($row["type"] == '4') 
	{
		echo "<div2>";
		echo $row["content"];
		echo "<br>";echo "<br>";
	
?>


		<!DOCTYPE html>
		<html>
		<body>
		<a href="Like.php?id=<?php echo $row['id'] ?> & post_id=<?php echo $row['post_id'] ?>">Like</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="Comment.php?post_id=<?php echo $row['post_id'] ?>">Comment</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="Share.php?id=<?php echo $row['id'] ?> & post_id=<?php echo $row['post_id'] ?>">Share</a>
		</body>
		</html>
		<?php
			echo "<br>";echo "<br>";
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
		echo "<br>";
		echo "Comments:";
		echo "<br>";echo "<br>";
		session_start();
		$getquery=mysqli_query($db,"SELECT id,comment FROM comment where post_id='{$row['post_id']}' ");
		while($rows=mysqli_fetch_assoc($getquery))
		{
			echo "<div4>";
			$sql4 = "SELECT firstname FROM contact WHERE id = '{$rows["id"]}'";
			$result4 = mysqli_query($db, $sql4);
			while ($row4 = mysqli_fetch_assoc($result4)) 
			{
				echo $row4["firstname"];
			}
			echo "</div4>";
			echo "<br>";
			echo "<div5>";
			echo "{$rows['comment']}";
			echo "</div5>";
			echo "<br>";echo "<br>";echo "<br>";
		}
		echo "<br>";echo "<br>";
		echo "</div2>";
	}
	
	else
	{
		echo "<div2>";
		echo '<img height="300" width"300" src="data:image;base64,'.$row["content"].'">';
		echo "<br>";echo "<br>";echo "<br>";echo "<br>";
		echo "</div2>";

	}
}

?>

</body>

</html>


