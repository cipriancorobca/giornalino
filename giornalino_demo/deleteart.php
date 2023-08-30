<!DOCTYPE html>
<html>
<body>

    <form id="form1" method="POST" action="scrittore_vii.php"></form>

    <?php  
        
        $_SESSION['user'] = 'ciprian.corobca';

        include_once("connect.php");

        $artID = $_POST['art'];

        $query = "DELETE FROM id21090150_giornalino.tblarticoli
                  WHERE idArt = '$artID'";
        $r = $c->query($query);

        if($r == false)
        {
            echo"Error";
        }

        else
        {
            echo "<script>document.getElementById('form1').submit();</script>";
        }
    ?>
</body>
</html>