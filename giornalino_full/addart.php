<?php
    session_start();
    $hotwords = array();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Scrivi un articolo</title>
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
            <form method="POST" action="add.php">
                <?php

                    $username = $_SESSION['user'];

                    include_once("connect.php");

                    $query3 = "SELECT tblutenti.matricola
                           FROM tblutenti
                           JOIN tblaccount ON tblaccount.idAcc = tblutenti.idAcc
                           WHERE tblaccount.username = '$username';";
                    $res3 = $c->query($query3);

                    $data3 = mysqli_fetch_array($res3,MYSQLI_ASSOC);

                    $mat = $data3['matricola'];
                ?>

                <textarea name='titolo' placeholder="Titolo" class='edittitle' rows='2' required></textarea>
                <textarea name='categoria' placeholder="Categoria" class='editcat' rows='1' required></textarea>
                <textarea name='contenuto' placeholder="Testo" class='editcontent'></textarea>
                <input type='hidden' name='autore' value="<?php echo $mat ?>">
                <br><br><button class="submit">Publica</button>
            </form>

            <form action="scrittore_vii.php">
                <button class="notsubmit">Cancella</button>
            </form>
        </div>

        <div class="footer">
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>