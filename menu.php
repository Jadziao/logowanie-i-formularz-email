<?php

$login="login";
$haslo="haslo";

session_start();

if(isset($_SESSION['login'])){

    echo "<h1>Siema ".$_SESSION['login']." super się zalogowałeś PogU</h1>";
    echo "<h3>Link do super formularza do wysyłania maili <br> \/ <br>";
    echo "<a href='mail.php" . SID . "'>";
    echo "Formularz email</a><br>";
    echo "<br><a href='wylogowanie.php" . SID . "'>";
    echo "<input type=button value=wyloguj name=wyloguj></a>";
}
    
else{
    if($_POST['login']==$login && $_POST['haslo']==$haslo)
    {
        $_SESSION['login']=$login;

        header("Location: menu.php");
    }


    else{
        if($_POST['login']!=$login && $_POST['haslo']!=$haslo)
            {
            echo "błędny login lub hasło";
            header("Location: login.php");
            }
        }
}
?>