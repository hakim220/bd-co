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


// var_dump($_SESSION['login']); ce var_dump sert à voir si l'utilisateur est connecté



// Les header HTML sont chargés à part pour être un minimum dynamique


//$langue = 'fr';

//$contenu = 'realisations';


// redirection vers le bon evenement en fonction de l'evenement choisi par l'utilisateur

if(isset($_GET['event'])) {
    $contenu = 'fiche_evenement';
	
	
	if(is_numeric($_GET['event']) == true  && strpbrk($_GET['event'], '.') ==false ) {
		$event = $_GET['event'];
	}
	else {
		$event = 1;
	}
}




// redirection vers le bon article en fonction de l'article choisi par l'utilisateur


if(isset($_GET['actualite'])) {
    $contenu = 'actualite_seule';
	
	if(is_numeric($_GET['actualite']) == true  && strpbrk($_GET['actualite'], '.') ==false ) {
		$actualite = $_GET['actualite'];
	}
	else {
		$actualite = 1;
	}
}


// redirection vers la bonne page redacteur en fonction du redacteur choisi par l'utilisateur

if(isset($_GET['redacteur'])) {
    $contenu = 'fiche_redacteur';

	
	if(is_numeric($_GET['redacteur']) == true &&  strpbrk($_GET['redacteur'], '.') ==false ) {
		$redacteur = $_GET['redacteur'];
	}
	else {
		$redacteur = 1;
	}
}



// redirection vers la bonne page forum en fonction du sujet choisi par l'utilisateur

if(isset($_GET['sujet_forum'])) {
    $contenu = 'forum_sujet';
	
	if(is_numeric($_GET['sujet_forum']) == true &&  strpbrk($_GET['sujet_forum'], '.') ==false ) {
		$forum_sujet = $_GET['sujet_forum'];
	}
	else {
		$forum_sujet = 1;
	}
}

// redirection vers la bonne fiche produit

if(isset($_GET['fiche_produit'])) {
    $contenu = 'fiche_produit';
	
	if(is_numeric($_GET['fiche_produit']) == true &&  strpbrk($_GET['fiche_produit'], '.') ==false ) {
		$forum_sujet = $_GET['fiche_produit'];
	}
	else {
		$fiche_produit = 1;
	}
}



// Contenu de la page
?>
	

<?php

	// Chargement de la page désirée (voir ousuisje.php)
	


	include $contenu.".php";
	
?>


<?php include "footer.php";  ?>



