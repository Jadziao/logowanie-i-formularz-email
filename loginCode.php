<?php
session_start();

if ((!isset($_POST['user'])) || (!isset($_POST['passwd'])))
{
    header('Location: login.php');
    exit();
}

require_once "connect.php";

$connect = @new mysqli($host, $db_user, $db_password, $db_name);
 
if ($connect->connect_errno!=0)
{
    echo "Error: ".$connect->connect_errno;
}
else
{
    $user = $_POST['user'];
    $passwd = $_POST['passwd'];
    $passwd= md5($passwd);
     
    $user = htmlentities($user, ENT_QUOTES, "UTF-8");
    $passwd = htmlentities($passwd, ENT_QUOTES, "UTF-8");
 
    if ($result = $connect->query(
    sprintf("SELECT * FROM users WHERE user='%s' AND passwd='%s'",
    mysqli_real_escape_string($connect,$user),
    mysqli_real_escape_string($connect,$passwd))))
    {
        $users_number = $result->num_rows;
        if($users_number>0)
        {
            $_SESSION['loginIn'] = true;
             
            $line = $result->fetch_assoc();
            $_SESSION['id'] = $line['id'];
            $_SESSION['user'] = $line['user'];
            $_SESSION['passwd'] = $line['passwd'];
            $_SESSION['email'] = $line['email'];

            
             
            unset($_SESSION['error']);
            $result->free_result();
            header('Location: mail.php');
             
        } else {
           
            echo '<div id="napis">error</div>';
            header('Location: login.php');
             
        }
         
    }
     
    $connect->close();
}
 
?>