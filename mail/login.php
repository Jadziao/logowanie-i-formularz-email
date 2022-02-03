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
                Login<input name="login" type="text"><br>
                Hasło<input name="haslo" type="password"><br>
                <button type="submit" name="submit">Zaloguj</button>
                <input type="reset" value="reset">
        </form>
    </body>
</html>