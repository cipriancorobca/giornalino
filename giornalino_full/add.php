<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Articolo salvato!</title>
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

        <form action="scrittore_vii.php">
            <button class="return">←</button>
        </form>

        <div class="header">
            <a class="homelink" href="scrittore_vi.php"><h1>Giornalino</h1></a>
        </div>

        <div class="maindiv">
            <form method="POST" action="upload.php">
                <?php

                    $autore = $_POST['autore'];
                    $content = $_POST['contenuto'];
                    $titolo = $_POST['titolo'];
                    $categoria = $_POST['categoria'];

                    include_once("connect.php");

                    $query1 = "INSERT INTO tblarticoli (titolo,contenuto,categoria,dataP,scrittore)
                               VALUES ('$titolo','$content','$categoria',utc_date(),'$autore');";
                    $res1 = $c->query($query1);

                    $articolo = $c->insert_id;

                    echo"<textarea name='titolo' class='edittitle' rows='2'>".$titolo."</textarea>";

                    echo"<textarea name='categoria' class='editcat' rows='1'>".$categoria."</textarea>";
                            
                    echo"<textarea name='contenuto' class='editcontent'>".$content."</textarea>";

                ?>
            </form>
        </div>

        <div>
            <h2 style="margin-left:45%;">Articolo salvato</h2><br>
            <h3>L'articolo raggiungera il <br>
                publico dopo una validazione</h3><br>
        </div>

        <div class="footer">
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>