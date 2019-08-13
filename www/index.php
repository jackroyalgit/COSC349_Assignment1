<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<body>
<h1>Test DB on one VM</h1>

<div id="main">
<h1>Insert data into websiteuser</h1>
<div id="websiteuserinput">
<h2>Websiteuser Form</h2>
<hr/>
<form action="" method="post">
<label>First Name :</label>
<input type="text" name="fname" id="fname" required="required" placeholder="Please Enter First Name"/><br /><br />
<label>Last Name :</label>
<input type="text" name="lname" id="lname" required="required" placeholder="Please Enter Second Name"/><br/><br />
<label>Occupation :</label>
<input type="text" name="occupation" id="occupation" required="required" placeholder="Please Enter Your Occupation"/><br/><br />
<input type="submit" value=" Submit " name="submit"/><br />
</form>
</div>

<p>Showing contents of websiteuserusers table:</p>

<table border="1">
<tr><th>First Name</th><th>Last Name</th><th>Occupation</th></tr>

<?php
 
$db_host   = '192.168.33.11';
$db_name   = 'jacksdb';
$db_user   = 'jackuser1';
$db_passwd = 'password1';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$sql = "INSERT INTO websiteuser (fname, lname, occupation)
VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["occupation"]."')";

if ($pdo->query($sql)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$q = $pdo->query("SELECT * FROM websiteuser");

while($row = $q->fetch()){
  echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["occupation"]."</td></tr>\n";
}


?>
</table>
<p>Hello. Do you want to view <a href="http://192.168.33.12">test</a> ?</p>
</div>
</body>
</html>
