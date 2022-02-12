<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
    <body>
        <h1>Teksty</h1>
        
                  
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "baza";


            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, tekst, author FROM posts";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              
                while($row = $result->fetch_assoc()) {
                  echo "id: " . $row["id"]. " - Name: " . $row["author"]. " - Text: " . $row["tekst"]. "<br>";
              }
            }   else {
                  echo "0 results";
            }
            $conn->close();
?>


        <label>
				<a href="text_edit.php">
					<input type="button" name="write" value="Nowy Tekst">
	    </label>
        <label>
				<a href="edit.php">
					<input type="button" name="edit" value="Edytuj">
	    </label>		
      <label>
				<a href="mail.php">
					<input type="button" name="edit" value="Wyślij maila">
	    </label>		
      <label>
				<a href="login.php">
					<input type="button" name="logOut" value="wyloguj">
    </body>
   
</html>