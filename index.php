<?php
// Initialisations des sessions
include "session.php";


// Chargement des fonctions utiles
include "initialisations.php";

include "langue.php";

include "ousuisje.php";

include "connexion.php";

// Fichier css à charger : il est possible de tester ici le navigateur pour changer de fichier éventuellement.

/*
if(isset($_GET['menu'])) {
	$stylesheet=$_GET['menu'].'.css' ; 
}
 if(isset($_GET['actualite']) || isset($_GET['actualites_news']) || isset($_GET['actualites_chroniques']) || isset($_GET['actualites_interviews'])){
	$stylesheet = "actualite.css";
}
else if(isset($_GET['event'])) {
	
	$stylesheet = "evenement-seul.css";
}
else {
	
	$stylesheet="home-page.css";
	
}
*/

// On peut commencer l'HTML maintenant

?>


<!doctype html>
<html lang="fr">

<?php


// Les header HTML sont chargés à part pour être un minimum dynamique
include "header.php";

var_dump($_SESSION['login']);
// Les header HTML sont chargés à part pour être un minimum dynamique


//$langue = 'fr';

//$contenu = 'realisations';

if(isset($_GET['event'])) {
    $contenu = 'fiche_evenement';
	
	
	if(is_numeric($_GET['event']) == true  && strpbrk($_GET['event'], '.') ==false ) {
		$event = $_GET['event'];
	}
	else {
		$event = 1;
	}
}


if(isset($_GET['actualite'])) {
    $contenu = 'actualite_seule';
	// ajout d'un condition ici pour checker qu'on a bien un chiffre dans l'id => on regarde si l'utilisateur touche à l'url
	// le <= 18 sera à incrementer à chaque fois que j'ajoute une realisation...
	
	if(is_numeric($_GET['actualite']) == true  && strpbrk($_GET['actualite'], '.') ==false ) {
		$actualite = $_GET['actualite'];
	}
	else {
		$actualite = 1;
	}
}

if(isset($_GET['redacteur'])) {
    $contenu = 'fiche_redacteur';
	// ajout d'un condition ici pour checker qu'on a bien un chiffre dans l'id => on regarde si l'utilisateur touche à l'url
	// le <= 18 sera à incrementer à chaque fois que j'ajoute une realisation...
	
	if(is_numeric($_GET['redacteur']) == true &&  strpbrk($_GET['redacteur'], '.') ==false ) {
		$redacteur = $_GET['redacteur'];
	}
	else {
		$redacteur = 1;
	}
}


// Contenu de la page
?>
	

<?php

	// Chargement de la page désirée (voir ousuisje.php)
	


	include $contenu.".php";
	
?>


<?php include "footer.php";  ?>



