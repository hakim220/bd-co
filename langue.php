<?php 


// gestion du mulitlingue... ça passe par l'url => GET
	$langue="fr";
	if(isset($_SESSION['langue'])) {
		$langue =  $_SESSION['langue'];
	}
	if(isset($_GET["langue"])) {
		$langue = $_GET["langue"];
	}
	
	/* ce if sert au cas ou un utilisateur touche à la langue dans l'url...*/
	if($langue != "fr" && $langue != "en") {
		$langue="fr";
	}
	
	$_SESSION['langue'] = $langue;


?>