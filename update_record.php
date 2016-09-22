<?php
    echo "Het id is: ".$_GET["id"];

    // Maak de verbinding met de mysql-server 
    include("connect_db.php");

    // Selecteer alle velden uit de tabel users
    $sql = "SELECT * FROM `users` WHERE `id` = '".$_GET["id"]."'";

    // Vuur de query af op de database
    $result = mysqli_query($conn, $sql);

    // Zet de resource $result om naar een associatief array
    $record = mysqli_fetch_array($result, MYSQLI_ASSOC);

    var_dump($record);

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
    </head>
    <body>
        <form action='' method='post'>
            <table>
                <tr>
                    <td>id:</td>
                    <td><input type='text' ></td>
                </tr>
                <tr>
                    <td>voornaam: </td>
                    <td><input type='text' value="PeppieEnKokkie" ></td>
                </tr>
                <tr>
                    <td>tussenvoegsel: </td>
                    <td><input type='text' ></td>
                </tr>
                <tr>
                    <td>achternaam: </td>
                    <td><input type='text' ></td>
                </tr>
                <tr>
                    <td>leeftijd: </td>
                    <td><input type='text' ></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' value='Update!' ></td>
                </tr>
            </table>
        </form>
    </body>
</html>