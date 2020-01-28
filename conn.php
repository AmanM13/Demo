<?php
   $dbhost = 'localhost';
     $dbuser = 'root';
     $dbpass = 'redhat';
     $dbname = 'schoolinfo';
     $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $mydata);
         if(! $conn ) {
            die('Could not connect: ' . mysql_connect_error());
         }
         echo 'Connected successfully';
         mysqli_close($conn);
?>
