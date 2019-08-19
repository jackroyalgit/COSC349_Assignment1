<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<link rel="stylesheet"type="text/css" href="style.css">
<body>
<div id="main">
<h1>Company X - User Survey</h1>
<div id="websiteuserinput">
<h2>Company Employee</h2>
<hr/>
<form action="" method="post">
<label>First Name :</label>
<input type="text" name="fname" id="fname" required="required" placeholder="Please Enter First Name"/><br /><br />
<label>Last Name :</label>
<input type="text" name="lname" id="lname" required="required" placeholder="Please Enter Second Name"/><br/><br />
<label>Occupation :</label>
<input type="text" name="occupation" id="occupation" required="required" placeholder="Please Enter Your Occupation"/><br/><br />
<label>Favourite Food :</label>
<input type="text" name="food" id="food" required="required" placeholder="Favourite Food?"/><br/><br />
<label>Favourite Music :</label>
<input type="text" name="music" id="music" required="required" placeholder="Favourite Music?"/><br/><br />
<label>Favourite Sport :</label>
<input type="text" name="sport" id="sport" required="required" placeholder="Favourite Sport?"/><br/><br />
<input type="submit" value=" Submit " name="submit"/><br />
</form>
</div>

<?php
if(isset($_POST["submit"])){ 
$db_host   = '192.168.33.11';
$db_name   = 'jacksdb';
$db_user   = 'jackuser1';
$db_passwd = 'password1';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$sql = "INSERT INTO websiteuser (fname, lname, occupation, food, music, sport)
VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["occupation"]."','".$_POST["food"]."','".$_POST["music"]."','".$_POST["sport"]."')";

if ($pdo->query($sql)) {
echo "<script type= 'text/javascript'>alert('New User Inserted Succesfully');</script>";
}

else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}
}

?>
</table>
<p>Hello. Do you want to view the <a href="http://192.168.33.12"> results from the survey</a>?</p>
</div>
</body>
</html>
