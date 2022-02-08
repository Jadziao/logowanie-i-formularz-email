<?php
session_start();

if ((!isset($_POST['user'])) || (!isset($_POST['passwd'])))
{
    header('Location: login.php');
    exit();
}

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
 
if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
    $user = $_POST['user'];
    $passwd = $_POST['passwd'];
     
    $user = htmlentities($user, ENT_QUOTES, "UTF-8");
    $passwd = htmlentities($passwd, ENT_QUOTES, "UTF-8");
 
    if ($rezultat = $polaczenie->query(
    sprintf("SELECT * FROM users WHERE user='%s' AND passwd='%s'",
    mysqli_real_escape_string($polaczenie,$user),
    mysqli_real_escape_string($polaczenie,$passwd))))
    {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
            $_SESSION['zalogowany'] = true;
             
            $wiersz = $rezultat->fetch_assoc();
            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['user'] = $wiersz['user'];
            $_SESSION['passwd'] = $wiersz['passwd'];
            $_SESSION['email'] = $wiersz['email'];

            
             
            unset($_SESSION['blad']);
            $rezultat->free_result();
            header('Location: mail.php');
             
        } else {
           
            echo '<div id="napis">error</div>';
            header('Location: login.php');
             
        }
         
    }
     
    $polaczenie->close();
}
 
?>