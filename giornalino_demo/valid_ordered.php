<?php
    session_start();
    $_SESSION['user'] = 'alessandro.ravoiu';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Giornalino</title>
        <link type="text/css" rel="stylesheet" href="style.css"></link>
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

        <div class="header">
            <a class="homelink" href="valid.php"><h1>Giornalino</h1></a>
        </div>

        <div class="maindiv">
            <form method="POST" action="valid_specific.php">
                <input type="text" placeholder="Search..." name="cerca" class="searchbar" required>
                <button class="searchbtn">🔍︎</button>
            </form>

            <div style="text-align:center;">
                <form method="POST" action="valid_ordered.php">
                    <button name="titolo" class="headingbtn" style="width:610px;margin-left:5px;
                                                                    border-top-left-radius:30px;
                                                                    border-bottom-left-radius:30px;
                                                                    text-indent:8px;">Title</button>
                    <button name="autore" class="headingbtn" style="width:150px;">Author</button>
                    <button name="data" class="headingbtn" style="width:250px;
                                                                  border-top-right-radius:30px;
                                                                  border-bottom-right-radius:30px;">Date</button>
                </form>

                <form method="POST" action="artvalid.php">
                    <?php

                    include_once("connect.php");

                    $query1;
                    $res;

                    if(isset($_POST['titolo']))
                    {
                        $query1 = "SELECT id21090150_giornalino.tblarticoli.idArt,id21090150_giornalino.tblarticoli.titolo,id21090150_giornalino.tblarticoli.dataP,id21090150_giornalino.tblutenti.nome,id21090150_giornalino.tblutenti.cognome
                                FROM id21090150_giornalino.tblarticoli
                                JOIN id21090150_giornalino.tblutenti ON id21090150_giornalino.tblutenti.matricola = id21090150_giornalino.tblarticoli.scrittore
                                WHERE id21090150_giornalino.tblarticoli.validato IS NULL
                                ORDER BY id21090150_giornalino.tblarticoli.titolo;";
                        $res = $c->query($query1);
                    }

                    else if(isset($_POST['autore']))
                    {
                        $query1 = "SELECT id21090150_giornalino.tblarticoli.idArt,id21090150_giornalino.tblarticoli.titolo,id21090150_giornalino.tblarticoli.dataP,id21090150_giornalino.tblutenti.nome,id21090150_giornalino.tblutenti.cognome
                                FROM id21090150_giornalino.tblarticoli
                                JOIN id21090150_giornalino.tblutenti ON id21090150_giornalino.tblutenti.matricola = id21090150_giornalino.tblarticoli.scrittore
                                WHERE id21090150_giornalino.tblarticoli.validato IS NULL
                                ORDER BY id21090150_giornalino.tblutenti.nome,tblutenti.cognome;";
                        $res = $c->query($query1);
                    }

                    else if(isset($_POST['data']))
                    {
                        $query1 = "SELECT id21090150_giornalino.tblarticoli.idArt,id21090150_giornalino.tblarticoli.titolo,id21090150_giornalino.tblarticoli.dataP,id21090150_giornalino.tblutenti.nome,id21090150_giornalino.tblutenti.cognome
                                FROM id21090150_giornalino.tblarticoli
                                JOIN id21090150_giornalino.tblutenti ON id21090150_giornalino.tblutenti.matricola = id21090150_giornalino.tblarticoli.scrittore
                                WHERE id21090150_giornalino.tblarticoli.validato IS NULL
                                ORDER BY id21090150_giornalino.tblarticoli.dataP;";
                        $res = $c->query($query1);
                    }

                    if($res == false)
                    {
                        echo"error";
                    }

                    else
                    {
                        while($data = mysqli_fetch_array($res,MYSQLI_ASSOC))
                        {
                            echo"<button class='visualizer' style='width:610px;text-indent:8px;
                                                        border-top-left-radius:30px;
                                                        border-bottom-left-radius:30px;'
                                name='art' value='".$data['idArt']."' id='titolo'>".$data['titolo']."</label><hr>";

                            echo"<button class='visualizer' style='width:150px;'
                                    name='art' value='".$data['idArt']."' id='autore'>".$data['nome']." ".$data['cognome']."</label><hr>";
                                    
                            echo"<button class='visualizer' style='width:250px;
                                                            border-top-right-radius:30px;
                                                            border-bottom-right-radius:30px;'
                                    name='art' value='".$data['idArt']."' id='data'>".$data['dataP']."</label><br><hr>";
                        }
                    }

                    ?>
                </form>
            </div>
        </div>

        <?php

            if(isset($_SESSION['user']))
            {
                echo"<form method='POST' action='logout.php'>
                     <button class='logout'>EXIT</button>
                     </form>";
            }

            else
            {
                echo"<script>close();</script>";
            }
        ?>

        <div class="footer">
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>