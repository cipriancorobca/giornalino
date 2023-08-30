<!DOCTYPE html>
<html>
<body>

    <form id="form1" method="POST" action="scrittore_vi.php"></form>
    <form id="form2" method="POST" action="valid.php"></form>
    <form id="form3" method="POST" action="index.php"></form>
    <?php
        session_start();
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $pass;
        
        include_once("connect.php");

        
        
        $query1 = "SELECT tblaccount.password, tblaccount.role
                   FROM tblaccount
                   WHERE username = '$user';";
        $res = $c->query($query1);

        if($res == false)
        {
            unset($_SESSION['user']);
            session_destroy();
            echo "<script>document.getElementById('form3').submit();</script>";
        }
        
        else
        {
            
            $data = mysqli_fetch_array($res,MYSQLI_ASSOC);
            $hash = $data['password'];
            if(password_verify($pass,$hash))
            {
                
                $role = $data['role'];

                if($role == "Scrittori")
                {
                    echo "<script>document.getElementById('form1').submit();</script>";
                }

                else if($role == "Validatori")
                {
                    echo "<script>document.getElementById('form2').submit();</script>";
                }
            }
            else
            {
                unset($_SESSION['user']);
                session_destroy();
                echo "<script>document.getElementById('form3').submit();</script>"; 
            }
        }
            

    ?>
</body>
</html>