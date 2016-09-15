<?php
    // Mijn wachtwoord is peppie_en_kokkie234

    # Dit is ook een geldige manier om tekst uit te commentarieren

    /* Ik ga
     * nu meerdere 
     * regels tekst 
     * schrijven en ik
     * commentarieer het uit */

    /* 
     $firstname = "Arjan";
     $infix = "de";
     $lastname = "Ruijter";
     # $spatie = " ";
     //$3dit_is_niet_goed = "foute naam";

     $_3goed = "Dit is goed";

     // Maak twee foute variabelen
     // Twee goede 
     // Een variabele die begint met een underscore
     # echo alle variabelen naar het scherm

     // Datatype String
     $ditIsMijnNaam = "Arjan"; #Camelcase notatie
     $dit_is_mijn_naam = "Bert"; //Dit is underscorenotatie
     $DitIsOokMijnNaam = "Harry"; /* Dit heet Pascalcase notatie */

     /*
     $dagVanDeWeek = "maandag";
     $weersgesteldheid = "mooi";

     // Datatype Integer en Float
     $getal_1 = 8.35; //float datatype
     $getal_2 = 12; // integer datatype
     $som = $getal_1 + $getal_2;
     $verschil = $getal_1 - $getal_2;
     $product = $getal_1 * $getal_2;
     $quotient = $getal_1 / $getal_2;


    echo "<h1>Hallo Wereld</h1>"; // Mooie code he
    echo $firstname." ".$infix." ".$lastname."<br>";
    







    echo "Het is vandaag ".$dagVanDeWeek." en het is ".$weersgesteldheid." weer<br>";

    echo "Het is vandaag $dagVanDeWeek en het is $weersgesteldheid weer<br>";
    
    echo 'Het is vandaag $dagVanDeWeek en het is $weersgesteldheid weer<br><hr>';

    echo "De som van ".$getal_1." + ".$getal_2." = ".($getal_1 + $getal_2)."<br>";

    echo "Het verschil van ".$getal_1." - ".$getal_2." = ".$verschil."<br>";
    
    echo "Het product van ".$getal_1." x ".$getal_2." = ".$product."<br>";

    echo "Het quotient van ".$getal_1." : ".$getal_2." = ".$quotient."<br><hr>";


    // Het datatype Array;

    // Dit is een voorbeeld van een indexed array
    echo "<h1>Indexed array's</h1>";

   
    $auto_1 = "Daf";
    $auto_2 = "Fiat";
    $auto_3 = "Saab";

    $auto = array("Ferrari", "Bugatti", "Daf", "Fiat", "Saab");

     var_dump($auto);
    echo "Mijn favoriet automerken zijn: ".$auto[2].", ".$auto[3].", ".$auto[4].
            ", ".$auto[0].", ".$auto[1]."<br><hr>";


    // Dit is een voorbeeld van een associatief array
    echo "<h1>Associatieve array's</h1>";

    $persoon = array("naam" => "Arjan",
                     "lengte" => 1.80,
                     "haarkleur" => "Grijs",
                     "leeftijd" => 47,
                     "schoenmaat" => 45 );

    var_dump($persoon);


    echo "Mijn naam is: ".$persoon["naam"]."<br>".
         "Ik ben ".$persoon["lengte"]." meter<br>".
         "Mijn haarkleur is: ".$persoon["haarkleur"]."<br>".
         "Ik ben ".$persoon["leeftijd"]." jaar oud<br>".
         "Mijn schoenmaat is: ".$persoon["schoenmaat"]."<br><hr>";
*/
         //var_dump($_POST);

         echo "<h3>U heeft de onderstaande gegevens ingevuld:</h3>";
         echo "Naam: ".$_POST["firstname"]." ".$_POST["infix"]." ".$_POST["lastname"]."<br>";
         echo "Wachtwoord: ".$_POST["password"]."<br>";
         echo "Favoriete games: ";
         if ( isset($_POST["game1"]) == 1)
         { 
                echo $_POST["game1"]." ";
         };
         if ( isset($_POST["game2"]) == 1)
         { 
                echo $_POST["game2"]." ";
         };
         if ( isset($_POST["game3"]) == 1)
         { 
                echo $_POST["game3"]." ";
         };
         if ( isset($_POST["game4"]) == 1)
         { 
                echo $_POST["game4"]." ";
         };
         if ( isset($_POST["game5"]) == 1)
         { 
                echo $_POST["game5"]." ";
         };
         echo "<hr>";
        /* Dit is een voorbeeld van een nutteloze functie
        begroeten("Ik heet arjan");

        function begroeten($tekst)
        {
                echo "Hallo ik ben functie".$tekst;
        }
        */
        //var_dump($_POST);

        echo "Gegevens uit de tabel users: ";
        
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "am1a_2016_loginregistration";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

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
       // echo $sql;
       mysqli_query($conn, $sql );


       $sql = "SELECT `id`, `firstname`, `infix`, `lastname`, `age`
               FROM   `users`";

       $result = mysqli_query($conn, $sql);

       //var_dump($result);
      
       echo "<table>";
        echo "<tr>
                <th>id</th>
                <th>voornaam</th>
                <th>tussenvoegsel</th>
                <th>achternaam</th>
                <th>leeftijd</th>
              </tr>";

        while ( $records = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
                echo "<tr>
                        <td>".$records["id"]."</td>
                        <td>".$records["firstname"]."</td>
                        <td>".$records["infix"]."</td>
                        <td>".$records["lastname"]."</td>
                        <td>".$records["age"]."</td>
                </tr>";
        }

       echo "</table>";

       //echo $records["id"];
       
       echo "De code staat vanaf nu op github.com onder gebruiker rra-am1a-2016 repository blok1-web-php<br>";

       /*
       echo "1<br>";
       echo "2<br>";
       echo "3<br>";
       echo "4<br>";
       echo "5<br>";

       $getal = 1;
       while ( $getal < 1200 )
       {
               // Code wordt uitgevoerd
               echo "nr: ".$getal."<br>";
               $getal = $getal + 1;
       }
       */
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

