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
        </form>
        <?php
    session_start();
     
    if (isset($_POST['email']))
    {
        
        $wszystko_OK=true;
         
        
         
        //Zapamiętaj wprowadzone dane
        $user=$_POST['user'];
        $passwd=$_POST['passwd'];
        $email=$_POST['email'];
        $date=date("Y-m-d");
        if (isset($_POST['submit'])) $_SESSION['submit'] = true;
         
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
         
        
        {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
                 
                if ($wszystko_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
                     
                    if ($polaczenie->query("INSERT INTO users VALUES (NULL, '$user', '$passwd', '$email', '$date')"))
                    {
                        $_SESSION['udanareje']=true;
                        header('Location: witamy.php');
                        echo "udalo sie";
                    }
                    else
                    {
                        throw new Exception($polaczenie->error);
                    }
                     
                }
                 
                $polaczenie->close();
            }
             
        }
           
?>


    </body>