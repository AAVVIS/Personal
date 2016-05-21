<!DOCTYPE html>
<html>
<body>
<form  method="post" enctype="multipart/form-data">
<input type="file" name="image"/>
<input type="submit" value="Upload" name="sumit"/>
</form>


<?php
	if(isset($_POST['sumit']))
	{
		if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
		{
			echo "Please select an image.";
		}
		else
		{
			$image=addslashes($_FILES['image']['tmp_name']);
			$name=addslashes($_FILES['image']['name']);
			$image=file_get_contents($image);
			$image=base64_encode($image);
			saveimage($name,$image);
		}
	}
	function saveimage($name,$image)
	{
		$hostname = "localhost"; // usually is localhost
		$db_user = "root"; // change to your database password
		$db_password = "Pass0013"; // change to your database password
		$database = "myid"; // provide your database name
		$db_table = "images"; // your database table name
		$db = mysqli_connect($hostname,$db_user,$db_password,$database);
		session_start();
		$sql = "insert into images values ('{$_SESSION["user_id"]}','{$name}','{$image}','0',NOW(),'5')";	
		$result = mysqli_query($db, $sql);
		if($result)
		{
			echo "Image uploaded"; echo "<br>";
			header("Location: Personal.php");
		}
		else
		{
			echo "Image not uploaded";
		}
	}

?>
</body>
</html>