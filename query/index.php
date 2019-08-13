<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
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
         $q = $pdo->query("SELECT * FROM websiteuser");

      while($row = $q->fetch()){
      echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["occupation"]."</td></tr>\n";
      }


      ?>
    </table>
    <p>Hello would you like to input some <a href="http://192.168.33.10"> data</a>?</p>
  </body>
</html>
