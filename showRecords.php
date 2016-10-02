<?php
   // Maak contact met de mysql-server
   include("connect_db.php");

   if ( isset($_POST) && !empty($_POST))
   {
       function sanitize($text)
       {
           // Haalt spaties, \n, returns, enz.. links en rechts weg
           $text = trim($text);

           // Verwijdert html en php tags
           $text = strip_tags($text);

           // escaped kritische tekens zoals ' en "
           $text = addslashes($text);
           return $text;
       }

       $firstname = sanitize($_POST["firstname"]);
       $infix = sanitize($_POST["infix"]);
       $lastname = sanitize($_POST["lastname"]);
       $password = sanitize($_POST["password"]);
       $age = sanitize($_POST["age"]);
       

       
        // Maak een INSERT query om het gegeven naar de database te schrijven.
        $sql = "INSERT INTO `users` (`id`,
                                        `firstname`,
                                        `infix`,
                                        `lastname`,
                                        `password`,
                                        `age`)
                VALUES              (NULL,
                                        '".$firstname."',
                                        '".$infix."',
                                        '".$lastname."',
                                        '".$password."',
                                        ".$age.")";
            // Stuur de query naar de database
            //echo $sql;exit();
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
                                        <td>
                                            <a href='update_record.php?id=".$records["id"]."'>
                                                <img src='./images/b_edit.png' alt='pencil'>
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
        <p>klik <a href='index.html'>hier</a> om terug te gaan naar het formulier<p>
   </body>
</html>


