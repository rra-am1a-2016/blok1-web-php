<?php
    // In dit bestand wordt er contact gemaakt met de mysql-server.
    include("connect_db.php");

    // Deze query verwijderd een record met een gegeven id.
    $sql = "DELETE FROM `users` WHERE `id` = '".$_GET["id"]."'";

    // De query wordt naar de database verstuurd.
    mysqli_query($conn, $sql );

    // Deze header functie stuurt ons direct door naar de ingestelde pagina.
    header("location: showRecords.php");    
?>