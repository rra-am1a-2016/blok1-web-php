<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "am1a_2016_loginregistration";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "SELECT `id`, `firstname`, `infix`, `lastname`, `age`
               FROM   `users`";

    $result = mysqli_query($conn, $sql);

    //var_dump($result);
    echo "Gegevens uit de tabel users: ";
    echo "<table>";
        echo "<tr>
                <th>id</th>
                <th>voornaam</th>
                <th>tussenvoegsel</th>
                <th>achternaam</th>
                <th>leeftijd</th>
                <th></th>
              </tr>";

                while ( $records = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                        echo "<tr>
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
       echo "</table>";
?>

<style>
    *
    {
            font-family: Verdana, Arial;
            padding: 0;
            margin: 0;
    }

    h3
    {
            border: 2px solid blue;

    }

    table, td, th 
    {
            border: 2px solid grey;
            padding:0.5em 1em;
            border-collapse: collapse;   
    }
</style>
