<?php
    session_start();
    $_SESSION['user'] = 'ciprian.corobca';
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

        <form action="scrittore_vi.php">
            <button class="return">←</button>
        </form>

        <div class="header">
            <a class="homelink" href="scrittore_vi.php"><h1>Giornalino</h1></a>
        </div>

        <div class="maindiv">
            <?php

                $artID = $_POST['art'];

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

                        echo"<script>document.title = '".$data1['titolo']."';</script>";
                    }
                }

            ?>
        </div>

        <div class="footer">
            <a class="homelink" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>