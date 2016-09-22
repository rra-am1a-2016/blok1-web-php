<?php
    // Maak de verbinding met de mysql-server 
    include("connect_db.php");
    
    if ( isset($_POST["submit"]))
    {
        echo "Er is op de knop gedrukt";

        $sql = "UPDATE `users` 
                SET     `firstname` = '".$_POST["firstname"]."',
                        `infix` = '".$_POST["infix"]."', 
                        `lastname` = '".$_POST["lastname"]."', 
                        `age` = '".$_POST["age"]."' 
                WHERE   `id` = ".$_POST["id"].";";
        echo $sql;
        mysqli_query($conn, $sql);
        var_dump($_POST);
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
                    <td><input type='text' value='<?php echo $record["id"]; ?>' readonly name='id'></td>
                </tr>
                <tr>
                    <td>voornaam: </td>
                    <td><input type='text' value='<?php echo $record["firstname"]; ?>' name='firstname' ></td>
                </tr>
                <tr>
                    <td>tussenvoegsel: </td>
                    <td><input type='text' value='<?php echo $record["infix"]; ?>' name='infix'></td>
                </tr>
                <tr>
                    <td>achternaam: </td>
                    <td><input type='text' value='<?php echo $record["lastname"]; ?>' name='lastname'></td>
                </tr>
                <tr>
                    <td>leeftijd: </td>
                    <td><input type='number' min='0' max='130' value='<?php echo $record["age"]; ?>' name='age'></td>
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