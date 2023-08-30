<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Giornalino</title>
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

                    $artID = $_POST['art'];
                    $content = $_POST['contenuto'];
                    $titolo = $_POST['titolo'];
                    $categoria = $_POST['categoria'];

                    include_once("connect.php");

                    $query1 = "SELECT titolo,contenuto
                            FROM tblarticoli
                            WHERE idArt = '$artID'
                            AND validato IS NULL;";
                    $res1 = $c->query($query1);

                    $query2 = "UPDATE tblarticoli
                               SET contenuto = '$content',titolo = '$titolo',categoria = '$categoria'
                               WHERE idArt = '$artID';";
                    $res2 = $c->query($query2);

                    echo"<textarea name='titolo' class='edittitle' rows='2'>".$titolo."</textarea>";

                    echo"<textarea name='categoria' class='editcat' rows='1' required>".$categoria."</textarea>";
                            
                    echo"<textarea name='contenuto' class='editcontent'>".$content."</textarea>";

                    echo"<script>document.title = 'Modificato:".$titolo."';</script>";

                ?>
            </form>
        </div>

        <div>
            <br><br><h3>Articolo publicato</h3>
        </div>

        <div class="footer">
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>