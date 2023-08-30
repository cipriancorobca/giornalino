<!DOCTYPE html>
<html>
<?php  

    session_start();

    if(isset($_POST['guestlogin']))
    {
        $_SESSION['user'] = "guest";
        $_SESSION['password'] = "";
    }
?>

<body>
    <form id="form1" method="POST" action="guest.php"></form>
    <script>document.getElementById('form1').submit();</script>
</body>
</html>