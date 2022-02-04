<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<main>
		<form
			id="formularz" 
			method="POST" 
			action="mail.php"
			autocomplete="off">

			<input name="temat" type="text" placeholder="Temat"><br>
			<input name="msg" type="text" placeholder="Wiadomość"><br>
			<input name="email" type="text" placeholder="E-mail"><br>
			<input name="od" type="text" placeholder="Od kogo"><br>
			<button type="submit" name="submit1" >wyslij</button>
			<input type="reset" value="reset">

		</form>
	</main>
<?php
	session_start();

	if(isset($_SESSION['login'])){

			echo "<br><a href='menu.php" . SID . "'>";
			echo "<input type=button name=cofanie value=cofnij></a>";
		
	}
			else{
					echo "<script>alert('zaloguj sie chuliganie')</script>";
					header("Location: login.php");
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

?>

</body>
</html>