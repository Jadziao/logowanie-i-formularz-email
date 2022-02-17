<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 
</head>
    <body>
      <h1>Wybierz Tekst</h1>
      <form action="texts.php"
            method="post">
        <input type="text" placeholder="Podaj id tekstu" name="podaj_id"><br>
        <button type="submit" name="pdi" value="idt">wyslij</button>
      </form>

        <h2>Teksty</h2>
        
                  
        <?php
         session_start();
     
         if (isset($_POST['podaj_id']))
         {
         
             $OK=true;
             $idt=($_POST['podaj_id']);}
             
              
             if (isset($_POST['pdi'])) $_SESSION['pdi'] = true;
             { 
            
             require_once "connect.php";
             mysqli_report(MYSQLI_REPORT_STRICT);
            
             
             
                 $connect = new mysqli($host, $db_user, $db_password, $db_name);
                 if ($connect->connect_errno!=0)
                 {
                     throw new Exception(mysqli_connect_errno());
                 }
                      
                 if (@$OK==true){
                     
                         
                          
                         
                         
             
             $sql = "SELECT  tekst, author, title, Id FROM posts WHERE Id='$idt'";
             $result = $connect->query($sql);}
 
             if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                 echo "Name: " . $row["author"]. "  - Text: " . $row["tekst"]."";
                }
               } else {
                 echo "0 results";
               }
 
               session_destroy();
               $connect->close();
             }
           

  
?>

              <h2>Comments</h2>
              <?php
            session_start();
     
            if (isset($_POST['podaj_id']))
            {
            
                $OK=true;
                $idt=($_POST['podaj_id']);}
                
                 
                if (isset($_POST['pdi'])) $_SESSION['pdi'] = true;
                { 
               
                require_once "connect.php";
                mysqli_report(MYSQLI_REPORT_STRICT);
               
                
                
                    $connect = new mysqli($host, $db_user, $db_password, $db_name);
                    if ($connect->connect_errno!=0)
                    {
                        throw new Exception(mysqli_connect_errno());
                    }
                         
                    if (@$OK==true){
                        
                            
                             
                            
                            
                
                $sql = "SELECT  comment, post_id, from_  FROM comments WHERE post_id='$idt'";
                $result = $connect->query($sql);}
    
                if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                     echo"From  ". $row["from_"]. " - Comment: " . $row["comment"]. "<br>";
                   }
                  } else {
                    echo "Nie ma komentarzy";
                  }
    
                  session_destroy();
                  $connect->close();
                }
          ?>
  
          <br>
          <br>
          <br>
            <form method="post"
                action="texts.php"
                autocomplete="off">
              <input type="hidden" name="post_id">
            <input type="text" name="from" placeholder="from"><br>
            <input type="text" name="idd" placeholder="id tekstu"><br>
            <input type="text" name="comment" placeholder="comment">
            <button type="submit" name="comm">Comment</button><br>
          </form>
        <br>
        <label>
				<a href="text_edit.php">
					<input type="button" name="write" value="Nowy Tekst">
        </a>
	    </label>
        <label>
				<a href="edit.php">
					<input type="button" name="edit" value="Edytuj">
          </a>
	    </label>		
      <label>
				<a href="mail.php">
					<input type="button" name="edit" value="Wyślij maila">
        </a>
	    </label>		
      <label>
				<a href="login.php">
					<input type="button" name="logOut" value="wyloguj">
        </a>
        <?php
                session_start();
      
                if (isset($_POST['comment']))
                {
                    
                    $OK=true;
                      
                    
                    
                    $post_id=$_POST['idd'];
                    $comment=$_POST['comment'];
                    $from_=($_POST['from']);
                    
                    
                    if (isset($_POST['comment'])) $_SESSION['comment'] = true;
                      
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
                                
                                  
                                if ($connect->query("INSERT INTO comments VALUES (NULL, '$comment', '$from_','$post_id')"))
                                {
                                    $_SESSION['oktekst']=true;
                                    header('Location: texts.php');
                                    echo "udalo sie";
                                }
                               
                                  
                            }
                            session_destroy();  
                            $connect->close();
                        }
                          
                    }
                        
              ?>
    </body>
   
</html>