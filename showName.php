<?php
   // Maak contact met de mysql-server
   include("connect_db.php");

   // Maak een INSERT query om het gegeven naar de database te schrijven.
   $sql = "INSERT INTO `users` (`id`,
                                `firstname`,
                                `infix`,
                                `lastname`,
                                `age`)
           VALUES              (NULL,
                                '".$_POST["firstname"]."',
                                '".$_POST["infix"]."',
                                '".$_POST["lastname"]."',
                                ".$_POST["age"].")";
       // Stuur de query naar de database
       mysqli_query($conn, $sql );

       echo "<br><a href='showRecords.php'>records uit de tabel users</a>";
?>
