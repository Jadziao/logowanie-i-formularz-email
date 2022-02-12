<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<main>
		<form
			id="form" 
			method="POST" 
			action="mail.php"
			autocomplete="off">

			<input name="title" type="text" placeholder="Temat"><br>
			<input name="msg" type="text" placeholder="Wiadomość"><br>
			<input name="email" type="text" placeholder="E-mail"><br>
			<input name="from" type="text" placeholder="Od kogo"><br>
			<button type="submit" name="submit1" >wyslij</button>
			<input type="reset" value="reset">
			<label>
				<a href="login.php">
					<input type="button" name="logOut" value="wyloguj">
				</a>
			</label>
			<label>
				<a href="texts.php">
					<input type="button" name="texts" value="Teksty">
				</a>
			</label>		
		</form>
	</main>





<?php

	if (isset($_POST["submit1"])) {
		
		require_once('phpmailer/PHPMailerAutoload.php'); 

		$mail = new PHPMailer;
		$mail->CharSet = "UTF-8";

		$from = $_POST['from'];
		$temat = $_POST['title'];
		$msg = $_POST['msg'];

		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com'; 
		$mail->Port = 465; 
		$mail->SMTPAuth = true; 
		$mail->Username = ""; 
		$mail->Password = ""; 
		$mail->SMTPSecure = 'ssl';


		$mail->FromName =$from; 
		$mail->AddAddress($_POST['email']); 

		$mail->IsHTML(true); 
		$mail->Subject =$title;
		$mail->Body=$msg;
		$mail->AltBody = 'Plaint text e-mail body / Treść wiadomości jako tekst';


		$mail->send();
			echo 'udało  sie';
			
		}

?>

</body>
</html>