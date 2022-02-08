<?php
 
    session_start();
     
    if (!isset($_SESSION['okRegister']))
    {
        header('Location: index.php');
        exit();
    }
    else
    {
        unset($_SESSION['okRegister']);
    }
     
   
    if (isset($_SESSION['user'])) unset($_SESSION['user']);
    if (isset($_SESSION['email'])) unset($_SESSION['email']);
    if (isset($_SESSION['passwd'])) unset($_SESSION['passwd']);
    
     
     
?>
 
<!DOCTYPE HTML>
<html lang="pl">
<head>
</head>
 
<body>
     
   <h1>Dzieki za rejestracje. Możesz teraz sie zalogować</h1> 
     
    <a href="login.php">Zaloguj się na swoje konto!</a>
    <br /><br />
 
</body>
</html>