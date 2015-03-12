<?php

$contenu = "accueil"; // Page par défaut


// test import github -> git

/*** 
								Gestion de deux cas :      
1) si l'utilisateur passe à l'anglais, quitte le site, et reviens sur la home (racine du site)
2) si l'utilisateur modifie menu dans l'url... pas le contenu de menu, mais menu
***/

$langue = $_SESSION['langue'];

if(isset($_GET['langue']) ==false && isset($_GET['menu']) ==false) {
	$langue="fr";
	$contenu = "accueil";
}

if(isset($_GET['menu']) ==false && isset($_GET['id']) ==false)  {
	$langue="fr";
	$contenu = "accueil";
}

/* fin de la gestion des 2 cas*/



if((isset($_GET['menu'])) && (file_exists($_GET['menu'].".php"))) // On regarde si un page est demandée et on contrôle que la page demandée existe
	$contenu = $_GET['menu'];
else if(isset($_GET['menu'])) { // On indique poliment à l'utilisateur, dans un div dédié, que la page qu'il souhaite n'existe pas
	$contenu = "404";
	//echo "<div id='information'>Page indisponible ! </div>";  /*si on veut creer une page 404 personnalisée... il faut creer un fichier404.php que l'on appelle ici*/
}
	
?>
