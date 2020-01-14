<?php

	include '../functions/main-functions.php';
	$user = $_SESSION['user'];
	$membre = $_SESSION['tchat'];
	
	$req = $db->query("SELECT * FROM messages WHERE (sender='$membre' AND receiver='$user') OR (receiver='$membre' AND sender='$user')");
	$results = array();
	
	while($rows = $req->fetchObject()){
		$results[] = $rows;
	}
	
	foreach($results as $message){
		?>
			<STYLE>A {text-decoration: none; color: black;} </STYLE>
			
			<div class="message <?php echo ($message->sender == $membre) ? 'message-membre' : 'message-user';?>">
				
				<a class="ShowOption1" href=''>
				
					<?= $message->message; ?>
					
					<span class="WinOption1">
						<?php

						$date = $db->query('SELECT date FROM messages WHERE id =\'' .$message->id. '\'');
						$donnees = $date->fetch();
						echo strftime('%d-%m-%Y %T', strtotime($donnees['date']));

						?>
					</span>
				</a>
			</div>
			<br/><br/>
		<?php
	}