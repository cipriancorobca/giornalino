<!DOCTYPE html>
<html>
<body>

    <?php
        $useful1 = $_POST['art'];
        $useful2 = $_POST['del'];
    ?>

    <form id="form1" method="POST" action="editart.php">
        <input type="hidden" name="art" value="<?php echo $useful1 ?>">
    </form>

    <form id="form2" method="POST" action="deleteart.php">
        <input type="hidden" name="art" value="<?php echo $useful2 ?>">
    </form>

    <?php  

        if(isset($_POST['art']))
        {
            echo "<script>document.getElementById('form1').submit();</script>";
        }

        else if(isset($_POST['del']))
        {
            echo "<script>document.getElementById('form2').submit();</script>";
        }

    ?>
</body>
</html>