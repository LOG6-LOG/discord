<h2 class="header">Mon profil</h2>

<div class="profile">

	Votre adresse email est :
	
	<?php
	
	$email = $_SESSION['tchat'];
	echo $email; 
	
	?>
	
	<br/>
	
	Votre nom est :
	
	<?php
	
	$user = $db->query('SELECT name FROM user WHERE email=\'' .$email. '\'');
	$donnees = $user->fetch();
	echo $donnees['name'];

	?>
	
	<br/>
	
	Vous avez envoyer 

	<?php
	
	$nbrMessages = 0;
	
	$messages = $db->query('SELECT * FROM messages WHERE sender=\'' .$email. '\'');
	
	while ($donnees = $messages->fetch())
	{
		$nbrMessages++;
	}
	
	echo $nbrMessages;

	?>

	message(s)
	
	<br/>
	
	Vous vous êtes inscrit le 
	
	<?php
	
	$inscription = $db->query('SELECT inscription FROM user WHERE email=\'' .$email. '\'');
	$donnees = $inscription->fetch();
	echo strftime('%d-%m-%Y', strtotime($donnees['inscription']));

	?>

</div>