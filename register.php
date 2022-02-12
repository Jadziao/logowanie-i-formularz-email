<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <form
            method="post"
            action="register.php"
            autocomplete="off">
                <h1>Rejestracja</h1>
                <input name="user" type="text" placeholder="User"><br>
                <input name="passwd" type="password" placeholder="Password"><br>
                <input name="email" type="text" placeholder="Email"><br>
                <button type="submit" name="submit">Zarejestruj</button>
                <a href="login.php">
                    <input type="button" name="login" value="login"/>
                </a>
        </form>
        <?php
    session_start();
     
    if (isset($_POST['email']))
    {
        
        $OK=true;
         
        
         
        
        $user=$_POST['user'];
        $passwd=md5($_POST['passwd']);
        $email=$_POST['email'];
        $date=date("Y-m-d");
        if (isset($_POST['submit'])) $_SESSION['submit'] = true;
         
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
         
        
        {
            $connect = new mysqli($host, $db_user, $db_password, $db_name);
            if ($connect->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
                 
                if ($OK==true)
                {
                    
                     
                    if ($connect->query("INSERT INTO users VALUES (NULL, '$user', '$passwd', '$email', '$date')"))
                    {
                        $_SESSION['okRegister']=true;
                        header('Location: Welcome.php');
                        echo "udalo sie";
                    }
                    else
                    {
                        throw new Exception($connect->error);
                    }
                     
                }
                 
                $connect->close();
            }
             
        }
           
?>


    </body>