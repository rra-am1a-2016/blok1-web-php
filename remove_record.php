<?php
    echo "Het aangeklikt record heeft id = ".$_GET["id"];
    var_dump($_GET);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "am1a_2016_loginregistration";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "DELETE FROM `users` WHERE `id` = '".$_GET["id"]."'";

    echo $sql;
        
       // echo $sql;
       mysqli_query($conn, $sql );
?>