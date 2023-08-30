<!DOCTYPE html>
<html>
<?php  

    session_start();
    unset($_SESSION['user']);
    session_destroy();
?>

<body>
    <form id="form1" method="POST" action="index.php"></form>
    <script>document.getElementById('form1').submit();</script>
</body>
</html>