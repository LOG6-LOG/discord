<div class="topbar">
    <a class="app-name" href="index.php">Messheinger v1.0.8</a>
    <a class="app-name2" href="index.php">©Heinformatique 2020</a>
    <span class="menu">
		<?php
			if(isLogged() == 1){
				?>
					<a href="index.php?page=membres" class="<?php echo ($page=='membres') ? 'active' : '' ?>">Membres</a>
					<a href="index.php?page=profile" class="<?php echo ($page=='profile') ? 'active' : '' ?>">Profile</a>
					<a href="index.php?page=logout">Déconnexion</a>
				<?php
			}else{
				?>
					<a href="index.php?page=register" class="<?php echo ($page=='register') ? 'active' : '' ?>">S'inscrire</a>
					<a href="index.php?page=signin" class="<?php echo ($page=='signin') ? 'active' : '' ?>">Se connecter</a>
				<?php
			}
		?>
	</span>
</div>
