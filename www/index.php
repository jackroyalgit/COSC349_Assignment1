<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Database test page</title>
</head>

<body>
<h1>Test DB on one VM</h1>

<p>Showing contents of websiteuserusers table:</p>

<table border="1">
<tr><th>First Name</th><th>Last Name</th><th>Occupation</th></tr>

<?php
 
$db_host   = '127.0.0.1';
$db_name   = 'jacksdb';
$db_user   = 'jackuser1';
$db_passwd = 'password1';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM websiteuser");

while($row = $q->fetch()){
  echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["occupation"]."</td></tr>\n";
}

?>
</table>
</body>
</html>
