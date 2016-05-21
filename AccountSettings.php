<style>
div{
position :relative;
top:200px;
left:60%;
color:MidnightBlue;
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

.text-line {
    background-color: transparent;
    color: black;
    outline: none;
    outline-style: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid lightblue 1px;
    padding: 2px 10px;
}
#bg-bottom {
  background-color: MidnightBlue;;
  position: fixed;
  top: 90%;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: -1;
}
#bg-left {
  background-image : url("Personal.jpg");
  -webkit-transform: rotate(-10deg); 
  position: fixed;
  background-size: 400px 250px;
  background-repeat: no-repeat;
  top: 28%;
  bottom: 35%;
  left: 10%;
  right: 30%;
  z-index: -1;
}
#x{
position:fixed;
background-size: 30px 10px;
  background-repeat: no-repeat;
  top: 0%;
  bottom: 60%;
  left:85%;
  right: -30%;
}
form input[type="submit"] {
    background: none;
    border: none;
    color: MidnightBlue;
    font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
    cursor: pointer;
    font-size: 18px;
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


</style>

<?php
session_start();
?>

<body>
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


<form action="Update.php" name="f1">
<div>
&nbsp;First Name&nbsp; <input type="text" name="fn" value ="<?php echo $_SESSION["firstname"] ?>" class="text-line"  value= "raa"  /><br><br><br>
&nbsp;Last Name &nbsp;<input type="text" name="ln" value ="<?php echo $_SESSION["try"] ?>" class="text-line" /><br><br><br>
&nbsp;Email-id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="em" value ="<?php echo $_SESSION["username"] ?>" class="text-line" /><br><br><br>
&nbsp;Password &nbsp;&nbsp;<input type="password" name="pwd" value ="<?php echo $_SESSION["password"] ?>" class="text-line" /><br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Edit" /> 
</div>

<div id="bg-bottom"></div>
<div id="bg-left"></div>

</form>
</body>
