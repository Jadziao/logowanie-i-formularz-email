<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <script src="ckeditor/ckeditor.js"></script>
</head>
    <body>

    

        <form method="post"
        action="text_edit.php"
        autocomplete="off">
                <input type="text" name="title" placeholder="title"><br>
                <input type="text" name="author" placeholder="author"><br>
                <textarea name="editor1"></textarea>
       

       
        
        <button type="submit" name="save" >Save</button>
        <label>
				<a href="texts.php">
					<input type="button" name="cofanie" value="cofnij">
        </form>
        <?php
               session_start();
     
               if (isset($_POST['title']))
               {
                   
                   $OK=true;
                    
                   
                    
                   
                   $title=$_POST['title'];
                   $author=($_POST['author']);
                   $tekst=$_POST['editor1'];
                   
                   if (isset($_POST['save'])) $_SESSION['save'] = true;
                    
                   require_once "connect.php";
                   mysqli_report(MYSQLI_REPORT_STRICT);
                    
                   
                   {
                       $connect = new mysqli($host, $db_user, $db_password, $db_name);
                       if ($connect->connect_errno!=0)
                       {
                           throw new Exception(mysqli_connect_errno());
                       }
                            
                           if ($OK==true)
                           {
                               
                                
                               if ($connect->query("INSERT INTO posts VALUES (NULL, '$title', '$tekst', '$author')"))
                               {
                                   $_SESSION['oktekst']=true;
                                   header('Location: texts.php');
                                   echo "udalo sie";
                               }
                               else
                               {
                                   throw new Exception($connect->error);
                               }
                                
                           }
                            
                           $connect->close();
                       }
                        
                   }
                      
            ?>
    </body>
    <script>
                CKEDITOR.replace( 'editor1' );
            </script>
</html>