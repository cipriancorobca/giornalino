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
        <div class="header">
            <a class="homelink" href="index.php"><h1>Giornalino</h1></a>
        </div>

        <div class="logindiv">
            <form method="POST" action="redirect.php">
                <input class="logininput" type="text" placeholder="Username" name="user" id="user" required><br>
                <input class="logininput" type="password" placeholder="Password" name="pass" id="pass" required><br>
                <button class="loginbtn">Accedi</button>
            </form>

            <form method="POST" action="guestrdr.php">
                <button name="guestlogin" class="guestbtn">Entra come ospite</button>
            </form>
        </div>

        <div class="footer">
            <a class="homelink" target=”_blank” href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><h5>(c) Corobca Ciprian | Michele Molent</h5></a>
        </div>
    </body>
</html>