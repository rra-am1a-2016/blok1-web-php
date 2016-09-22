<?php
   // Maak contact met de mysql-server
   include("connect_db.php");


   if ( !empty($_POST))
   {
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
   } 

    // Maak een SELECT query voor het selecteren van alle records uit de tabel users
    $sql = "SELECT `id`, `firstname`, `infix`, `lastname`, `age`
               FROM   `users`";

    // Verstuur de query naar de database.
    $result = mysqli_query($conn, $sql);

    //var_dump($result);
    $table = "Gegevens uit de tabel users: ";
    $table .=  "<table>";
    $table .=  "<tr>
                   <th>id</th>
                   <th>voornaam</th>
                   <th>tussenvoegsel</th>
                   <th>achternaam</th>
                   <th>leeftijd</th>
                   <th></th>
               </tr>";
                while ( $records = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                        $table .=  "<tr>
                                        <td>".$records["id"]."</td>
                                        <td>".$records["firstname"]."</td>
                                        <td>".$records["infix"]."</td>
                                        <td>".$records["lastname"]."</td>
                                        <td>".$records["age"]."</td>
                                        <td>
                                        <a href='remove_record.php?id=".$records["id"]."'>
                                        <img src='./images/b_drop.png' alt='kruis'>
                                        </a>
                                        </td>
                                   </tr>";
                }
    $table .= "</table>";

       
?>

<!DOCTYPE html>
<html>
   <head>
        <title>users</title>
        <link rel='stylesheet' type='text/css' href='css/style.css' >
   </head>
   <body>
        <?php echo $table; ?>
   </body>
</html>


