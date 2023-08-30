<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link type="text/css" rel="stylesheet" href="style.css"></link>
    </head>

    <body>
        <div class="header" style="margin-bottom:-69px;">
            <a class="homelink" href="index.php"><h1>Giornalino</h1></a>
        </div>

        <div class="logindiv" style="margin-top:250px;">
            <form method="POST" action="redirect1.php">
                <button class="loginbtn" style="width:232px;">Writer</button>
            </form>

            <form method="POST" action="redirect2.php">
                <button class="loginbtn" style="width:272px;">Validator</button>
            </form>

            <form method="POST" action="guestrdr.php">
                <button name="guestlogin" class="loginbtn">Reader</button>
            </form>
        </div>

        <div class="footer">
            <h5>This is for demonstration purposes.The source code for the full version is on my <a href="https://github.com/cipriancorobca/giornalino" target="_blank" class="homelink">Github</a></h5><br>
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>