<!DOCTYPE html>
<html>
<body>

    <form id="form1" method="POST" action="valid.php"></form>
    <?php
        session_start();
        $_SESSION['user'] = "alessandro.ravoiu";

        echo "<script>document.getElementById('form1').submit();</script>";
    ?>
</body>
</html>