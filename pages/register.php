<?php
	if(isLogged() == 1){
		header("Location:index.php?page=membres");
	}

?>

<h2 class="header header-form">S'inscrire</h2>

<?php

	if(isset($_POST['submit'])){
		$name = htmlspecialchars(trim($_POST['name']));
		$email = htmlspecialchars(trim($_POST['email']));
		$password = sha1(htmlspecialchars(trim($_POST['password'])));
		
		if(email_taken($email) == 1)
		{
			$error_email = "L'adresse email est déjà utilisée, veuillez en saisir une autre.";
		}
		else if(sha1(htmlspecialchars(trim($_POST['password']))) != sha1(htmlspecialchars(trim($_POST['confirm-password']))))
		{
			$error_email = "Les mots de passe saisis ne sont pas identiques, veuillez recommencer.";
		}
		else
		{
			register($name, $email, $password);
			$_SESSION['tchat'] = $email;
			header("Location:index.php?page=membres");
		}
	}
?>

<form method="post" id="regForm">

	<div class="field">
    <label for="name" class="field-label">Votre pseudo</label>
    <input type="text" id="name" name="name" class="field-input">
	</div>

	<div class="field">
    <label for="email" class="field-label">Votre email</label>
    <input type="email" id="email" name="email" class="field-input">
	</div>
	
	<div class="field">
    <label for="password" class="field-label">Votre mot de passe</label>
    <input type="password" id="password" name="password" class="field-input">
	</div>
	
	<div class="field">
    <label for="password" class="field-label">Confirmer le mot de passe</label>
    <input type="password" id="password" name="confirm-password" class="field-input">
	</div>
	
	<p class="error"><?php echo (isset($error_email)) ? $error_email : ''; ?></p>
	
	<button type="submit" name="submit">S'inscrire</button>
	
</form>
