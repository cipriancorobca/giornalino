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
                        <button class='logout'>ESCI</button>
                    </form>";
                
                echo"<h5 style='top:0;
                                right:0;
                                margin-right:15px;
                                margin-top:5px;
                                position:fixed;
                                display:block;'
                                >".$_SESSION['user']."</h5>";
            }

            else
            {
                echo"<script>close();</script>";
            }
        ?>

        <form action="valid.php">
            <button class="return">←</button>
        </form>

        <div class="header">
            <a class="homelink" href="valid.php"><h1>Giornalino</h1></a>
        </div>

        <div class="maindiv">
            <?php

                include_once("connect.php");

                $validatore = $_POST['validatore'];
                $art = $_POST['art'];

                $update = "UPDATE tblarticoli
                           SET validato = '$validatore'
                           WHERE idArt = '$art';";
                $u = $c->query($update);

                $query1 = "SELECT tblarticoli.titolo,tblarticoli.dataP,tblutenti.nome,tblutenti.cognome,tblarticoli.contenuto,tblarticoli.categoria
                        FROM tblarticoli
                        JOIN tblutenti ON tblutenti.matricola = tblarticoli.scrittore
                        WHERE tblarticoli.idArt = '$art';";
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

                        echo"<script>document.title = 'Validato:".$data1['titolo']."';</script>";
                    }
                }

            ?>
        </div>

        <div>
            <h3>Articolo validato</h3>
        </div>

        <div class="footer">
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>