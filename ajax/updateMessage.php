<?php
	include '../functions/main-functions.php';
	$email = $_POST['email'];


	$db->query("UPDATE messages SET receiversee='1' WHERE receiver='{$email}'");
						