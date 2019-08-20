<html>
  <link rel="stylesheet"type="text/css" href="style.css">
  <div id="main">
  <head>
  </head>
  <body>
    <h1>Showing contents of websiteuserusers table:</h1>
    <table border="1">
      <tr><th>First Name</th><th>Last Name</th><th>Occupation</th><th>Fav Food</th><th>Fav Music</th><th>Fav Sport</th></tr>
  </div>
      <?php
         $db_host   = '192.168.33.11';
         $db_name   = 'jacksdb';
         $db_user   = 'jackuser1';
         $db_passwd = 'password1';

         $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

         $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
         $q = $pdo->query("SELECT * FROM websiteuser");

      while($row = $q->fetch()){
      echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["occupation"]."</td><td>".$row["food"]."</td><td>".$row["music"]."</td><td>".$row["sport"]."</td></tr>\n";
      }
      ?>
  </table>


  <h1>Showing first, last names of websiteuserusers table:</h1>
  <table border="1">
    <tr><th>First Name</th><th>Last Name</th></tr>
   <?php
      $q1 = $pdo->query("SELECT fname,lname FROM websiteuser");
      while($row = $q1->fetch()){
      echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td></tr>\n";
    }
    ?>
  </table>
   
    <p>Hello would you like to input some <a href="http://192.168.33.10"> data</a>?</p>
  </body>
</html>
