<!DOCTYPE html>
<html>
<head> </head>
<body>
<form 
	method="POST" 
	action="mail.php"
	autocomplete="off">
	Temat<input name="temat" type="text"><br>
	Wiadomość<input name="msg" type="text"><br>
	e-mail<input name="email" type="text"><br>
	od<input name="od" type="text"><br>
	<button type="submit" name="submit1" >wyslij</button>
	<input type="reset" value="reset">
</form>
<?php
	session_start();

	if(isset($_SESSION['login'])){

		echo "<br><a href='menu.php'><input type=button name=cofanie value=cofnij></a>";
	
}
else{
	echo "<script>alert('zaloguj sie chuliganie')</script>";
	echo "<script>location.href='login.php'</script>";
}

?>




<?php

if (isset($_POST["submit1"])) {
	
require_once('phpmailer/PHPMailerAutoload.php'); 

$mail = new PHPMailer;
$mail->CharSet = "UTF-8";

$name = $_POST['od'];
$temat = $_POST['temat'];
$msg = $_POST['msg'];

$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 465; 
$mail->SMTPAuth = true; 
$mail->Username = ""; 
$mail->Password = ""; 
$mail->SMTPSecure = 'ssl';


$mail->FromName =$name; 
$mail->AddAddress($_POST['email']); 

$mail->IsHTML(true); 
$mail->Subject =$temat;
$mail->Body=$msg;
$mail->AltBody = 'Plaint text e-mail body / Treść wiadomości jako tekst';


$mail->send();
	echo 'udało  sie';
	
}
exit;
?>

</body>
</html>