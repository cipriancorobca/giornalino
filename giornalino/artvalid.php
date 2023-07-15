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

                $artID = $_POST['art'];
                $username = $_SESSION['user'];
                $art = $artID;

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

                        echo"<script>document.title = 'Articolo da validare:".$data1['titolo']."';</script>";
                    }
                }

                $query3 = "SELECT tblutenti.matricola
                           FROM tblutenti
                           JOIN tblaccount ON tblaccount.idAcc = tblutenti.idAcc
                           WHERE tblaccount.username = '$username';";
                $res3 = $c->query($query3);

                $data3 = mysqli_fetch_array($res3,MYSQLI_ASSOC);

                $mat = $data3['matricola'];

            ?>
        </div>

        <form method="POST" action="artvalidated.php">
            <input type="hidden" name="validatore" value="<?php echo $mat ?>">
            <input type="hidden" name="art" value="<?php echo $art ?>">
            <button class="submit">Valida</button>
        </form>

        <form action="valid.php">
            <button class="notsubmit">Non valido</button>
        </form>

        <div class="footer">
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>