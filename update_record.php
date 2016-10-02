<?php
    // Maak de verbinding met de mysql-server 
    include("connect_db.php");
    
    if ( isset($_POST["submit"]))
    {
        echo "Er is op de knop gedrukt";

       function sanitize($text)
       {
           
           // Haalt spaties, \n, returns, enz.. links en rechts weg
           $text = trim($text);

           // Verwijdert html en php tags
           $text = strip_tags($text);

           // escaped kritische tekens zoals ' en "
           $text = addslashes($text);

           // of gebruik...
           //$text = mysqli_real_escape_string($conn, $text);
           return $text;
       }

       $firstname = sanitize($_POST["firstname"]);
       $infix = sanitize($_POST["infix"]);
       $lastname = sanitize($_POST["lastname"]);
       $age = sanitize($_POST["age"]);
       


        $sql = "UPDATE `users` 
                SET     `firstname` = '".$firstname."',
                        `infix` = '".$infix."', 
                        `lastname` = '".$lastname."', 
                        `age` = '".$age."' 
                WHERE   `id` = ".$_POST["id"].";";
        
        mysqli_query($conn, $sql);
        
        header("location: showRecords.php");
    }
    else
    {


    // Selecteer alle velden uit de tabel users
    $sql = "SELECT * FROM `users` WHERE `id` = '".$_GET["id"]."'";

    // Vuur de query af op de database
    $result = mysqli_query($conn, $sql);

    // Zet de resource $result om naar een associatief array
    $record = mysqli_fetch_array($result, MYSQLI_ASSOC);

    /* Gereserveerde html-tekens die direct zonder te interpreteren naar het scherm moeten worden geschreven
     * moeten worden omgezet naar htmlentities */    
    $id = htmlentities($record['id'], ENT_QUOTES);
    $firstname = htmlentities($record['firstname'], ENT_QUOTES);
    $infix = htmlentities($record['infix'], ENT_QUOTES);
    $lastname = htmlentities($record['lastname'], ENT_QUOTES);
    $age = htmlentities($record['age'], ENT_QUOTES);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
    </head>
    <body>
        <h3>Wijzig de gegevens:</h3>
        <form action='update_record.php' method='post'>
            <table>
                <tr>
                    <td>id:</td>
                    <td><input type='text' value='<?php echo $id; ?>' readonly name='id'></td>
                </tr>
                <tr>
                    <td>voornaam: </td>
                    <td><input type='text' value='<?php echo $firstname; ?>' name='firstname' ></td>
                </tr>
                <tr>
                    <td>tussenvoegsel: </td>
                    <td><input type='text' value='<?php echo $infix; ?>' name='infix'></td>
                </tr>
                <tr>
                    <td>achternaam: </td>
                    <td><input type='text' value='<?php echo $lastname; ?>' name='lastname'></td>
                </tr>
                <tr>
                    <td>leeftijd: </td>
                    <td><input type='number' min='0' max='130' value='<?php echo $age; ?>' name='age'></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' value='Update!' name='submit' ></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
    }
?>