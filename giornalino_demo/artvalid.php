<?php
    session_start();
    $_SESSION['user'] = 'alessandro.ravoiu';
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
                    <button class='logout'>EXIT</button>
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

                $query1 = "SELECT id21090150_giornalino.tblarticoli.titolo,id21090150_giornalino.tblarticoli.dataP,id21090150_giornalino.tblutenti.nome,id21090150_giornalino.tblutenti.cognome,id21090150_giornalino.tblarticoli.contenuto,id21090150_giornalino.tblarticoli.categoria
                        FROM id21090150_giornalino.tblarticoli
                        JOIN id21090150_giornalino.tblutenti ON id21090150_giornalino.tblutenti.matricola = id21090150_giornalino.tblarticoli.scrittore
                        WHERE id21090150_giornalino.tblarticoli.idArt = $artID;";
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

                        echo"<script>document.title = 'Quality check:".$data1['titolo']."';</script>";
                    }
                }

                $query3 = "SELECT id21090150_giornalino.tblutenti.matricola
                           FROM id21090150_giornalino.tblutenti
                           JOIN id21090150_giornalino.tblaccount ON id21090150_giornalino.tblaccount.idAcc = id21090150_giornalino.tblutenti.idAcc
                           WHERE id21090150_giornalino.tblaccount.username = '$username';";
                $res3 = $c->query($query3);

                $data3 = mysqli_fetch_array($res3,MYSQLI_ASSOC);

                $mat = $data3['matricola'];

            ?>
        </div>

        <form method="POST" action="artvalidated.php">
            <input type="hidden" name="validatore" value="<?php echo $mat ?>">
            <input type="hidden" name="art" value="<?php echo $art ?>">
            <button class="submit">Validate</button>
        </form>

        <form action="valid.php">
            <button class="notsubmit">Not valid</button>
        </form>

        <div class="footer">
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>