<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                background-color: black;
                color:white;
            }
        </style>
    </head>
    <body>
        <form
            method="post"
            action="menu.php"
            autocomplete="off">
                <h1>Logowanie</h1>
                <input name="login" type="text" placeholder="Login"><br>
                <input name="haslo" type="password" placeholder="Hasło"><br>
                <button type="submit" name="submit">Zaloguj</button>
                <input type="reset" value="reset">
        </form>
    </body>
</html>