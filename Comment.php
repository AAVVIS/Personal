<?php
session_start();
$_SESSION["post_id"] = "{$_GET['post_id']}";
?>
<html> 
<body>
<table>
<form action="insertComment.php" method="POST">
<tr><td colspan="2"><?php echo $_SESSION["firstname"] ?> </td></tr>
<tr><td colspan="5"><textarea name="comment" rows="10" cols="50"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
</table>
</form>
</body>
</html>

