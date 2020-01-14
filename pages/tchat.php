<?php
	include 'js/textarea.js';
	
	if(!isset($_GET['user']) || isLogged() == 0 || user_exist() != 1){
		header("Location:index.php?page=home");
	}
	
	$_SESSION['user'] = $_GET['user'];
	
	foreach(get_user() as $user){
?>
			<h2 class="header"><?= $user->name; ?></h2>
			
			<?php 
					$email = $_SESSION['tchat'];						
			?>
			
			<div class="messages-box">
			
			</div>
			
			<div class="bottom">
				<div class="field field-area">
					<label for="message" class="field-label">Votre message</label>
					<textarea name="test" id="test"></textarea>
					<textarea name="message" id="message" rows="2" class="field-input field-textarea" onkeydown="MaxLengthTextarea(this, 14); EnterFunction();"></textarea>
				</div>
				<button type="submit" id="send" class="send">
					<span class="sendmessage">Envoyer</span>
				</button>
			</div>
	<?php } ?>

	<script>
		$(document).ready(() => {
			let email = '<?php echo $email ?>';
			$.post(`ajax/updateMessage.php`, {email: email}, function(data){
				console.log(data);
			});
		});
	</script>