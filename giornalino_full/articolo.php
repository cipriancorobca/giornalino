<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css"></link>
    </head>

    <body>
        <?php

            if(isset($_SESSION['user']))
            {
                echo"<form method='POST' action='logout.php'>
                        <button class='logout3'>ACCEDI</button>
                    </form>";
            }

            else
            {
                echo"<script>close();</script>";
            }
        ?>

        <form action="guest.php">
            <button class="return" style="margin-left:130px;">←</button>
        </form>

        <div class="header">
            <a class="homelink" href="guest.php"><h1>Giornalino</h1></a>
        </div>

        <div class="maindiv">
            <?php

                $artID = $_POST['art'];

                include_once("connect.php");

                $query1 = "SELECT tblarticoli.titolo,tblarticoli.dataP,tblutenti.nome,tblutenti.cognome,tblarticoli.contenuto,tblarticoli.categoria
                        FROM tblarticoli
                        JOIN tblutenti ON tblutenti.matricola = tblarticoli.scrittore
                        WHERE tblarticoli.idArt = $artID;";
                $res1 = $c->query($query1);

                if($res1 == false)
                {
                    echo"error";
                }

                else
                {
                    while($data1 = mysqli_fetch_array($res1,MYSQLI_ASSOC))
                    {
                        echo"<h2>".$data1['titolo']."</h2><br>";

                        echo"<h4>".date("D, d F Y",strtotime($data1['dataP'])).
                            " ✎ ".$data1['nome']." ".$data1['cognome']."</h4><br>";
                        
                        echo"<h4>".$data1['categoria']."</h4>";
                                
                        echo"<h6>".$data1['contenuto']."</h6><br>";

                        echo"<script>document.title = '".$data1['titolo']."';</script>";
                    }
                }

            ?>
        </div>

        <div class="footer">
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>