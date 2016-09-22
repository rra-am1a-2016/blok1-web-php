<?php
    echo "U heeft het record met id = ".$_GET["id"]." succesvol gedelete";
    //var_dump($_GET);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "am1a_2016_loginregistration";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "DELETE FROM `users` WHERE `id` = '".$_GET["id"]."'";

    //echo $sql;
        
    // echo $sql;
    mysqli_query($conn, $sql );

    header("refresh: 2.5; url=showRecords.php");
    
?>