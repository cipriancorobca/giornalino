<!DOCTYPE html>
<html>
<body>

    <form id="form1" method="POST" action="scrittore_vi.php"></form>
    <?php
        session_start();
        $_SESSION['user'] = "ciprian.corobca";

        echo "<script>document.getElementById('form1').submit();</script>";
    ?>
</body>
</html>