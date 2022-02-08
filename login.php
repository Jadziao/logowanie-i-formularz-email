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
                <input name="user" type="text" placeholder="Login"><br>
                <input name="passwd" type="password" placeholder="Hasło"><br>
                <button type="submit" name="submit">Zaloguj</button>
                <input type="reset" value="reset">
                <a href="register.php">
                    <input type="button" name="register" value="register"/>
        </form>

        
        
    </body>
</html>