<?php
	if(isLogged() == 0){
		header("Location:index.php?page=signin");
	}
?>

<STYLE>A {text-decoration: none;} </STYLE>

<h2 class="header">Tous les membres</h2>

<?php

	foreach(get_membres() as $membre){
		if($membre->email != $_SESSION['tchat']){
			?>
				<div class="membre">
					<strong><?= $membre->name ?></strong><br/>
					<span><?= $membre->email ?></span><br/>
					<div>
						Vous avez 
						<?php

						$email = $_SESSION['tchat'];
	
						$nbrMessagesNonVu = 0;
	
						$messages = $db->query('SELECT * FROM messages WHERE receiversee=\'0\' AND receiver=\'' .$email. '\'');
						
						while ($donnees = $messages->fetch())
						{
							$nbrMessagesNonVu++;
						}
						
						echo $nbrMessagesNonVu;
					
						?>

						message(s) non vu.
					</div>


					<a class="select" href="index.php?page=tchat&user=<?= $membre->email ?>">
						<button type="tchat" name="tchat" >Tchat</button>
					</a>
					
				</div>
			
			<?php
		}
	}
?>
