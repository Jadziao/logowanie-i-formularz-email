<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <script src="ckeditor/ckeditor.js"></script>
</head>
    <body>
    <?php
        session_start();
     
        if (isset($_POST['?']))
        {
        
            $OK=true;
            $idn=($_POST['?']);}
            
             
            if (isset($_POST['submit3'])) $_SESSION['submit3'] = true;
            { 
           
            require_once "connect.php";
            mysqli_report(MYSQLI_REPORT_STRICT);
           
            
            
                $connect = new mysqli($host, $db_user, $db_password, $db_name);
                if ($connect->connect_errno!=0)
                {
                    throw new Exception(mysqli_connect_errno());
                }
                     
                if (@$OK==true){
                    
                        
                         
                        
                        
            
            $sql = "SELECT  tekst, author, title, Id FROM posts WHERE Id='$idn'";
            @$result = $connect->query($sql);}

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                 $_SESSION['txt']= "" . $row["tekst"].  "";
                 $_SESSION['titl']= "" . $row["title"].  "";
                 $_SESSION['auth']= "" . $row["author"].  "";
                 $_SESSION['id']= "" . $row["Id"].  "";
                }
              } else {
                echo "0 results";
              }

              session_destroy();
              
            }
        ?>
        <?php
    
    if(isset($_POST['edit']))
    {
        require_once "connect.php";
       
       $connect = mysqli_connect($hostname, $username, $password, $databaseName);
       
       
       
       $id = $_POST['id'];
       $aut = $_POST['newauthor'];
       $tit = $_POST['newtitle'];
       $txt = $_POST['editor1'];
               
       
       $query = "UPDATE `posts` SET `title`='".$tit."',`author`='".$aut."',`tekst`= '".$txt."'WHERE `Id` = $id";

       
       $result = mysqli_query($connect, $query);
       
       if($result)
       {
           echo 'Data Updated';
       }else{
           echo 'Data Not Updated';
       }
       mysqli_close($connect);
       }


       


   
   ?>

    <form method="post"
        action="edit.php"
        autocomplete="off">
                <textarea type="text" name="?" placeholder="Podaj id"></textarea><br>
                <textarea type="text" name="newtitle" placeholder="title"><?php
                    if (isset($_SESSION['titl']))
                    {
                    echo $_SESSION['titl'];
                    unset($_SESSION['titl']);
                    }
                    ?></textarea><br>
                <textarea type="text" name="newauthor" placeholder="author"><?php
                    if (isset($_SESSION['auth']))
                    {
                    echo $_SESSION['auth'];
                    unset($_SESSION['auth']);
                    }
                    ?></textarea>
                    
                <br><textarea type="text" name="id" placeholder="id"><?php
                    if (isset($_SESSION['id']))
                    {
                    echo $_SESSION['id'];
                    unset($_SESSION['id']);
                    }
                    ?></textarea><br>
                <textarea name="editor1">
                    <?php
                    if (isset($_SESSION['txt']))
                    {
                    echo $_SESSION['txt'];
                    unset($_SESSION['txt']);
                    }
                    ?>
                </textarea>
                <button type="submit" name="submit3" value="xxxxxxxxxxxxxx">Sprawdź to ID</button>
                <button type="submit" name="edit" >edytuj</button>
                <label>
				<a href="texts.php">
					<input type="button" name="write" value="cofnij">
    </form>
    

      
    
    </body>
    <script>
                CKEDITOR.replace( 'editor1' );
            </script>
</html>