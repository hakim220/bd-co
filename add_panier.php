<?php
// Initialisations des sessions
include "session.php";


// Chargement des fonctions utiles
include "initialisations.php";

include "langue.php";

include "ousuisje.php";

include "connexion.php";

include "header.php";


include 'mes_class.php'; 


	$panier = new panier();




if(isset($_GET['id_product'])) {
	$connexion_bdd = cree_connexion();
	$sql = "SELECT * FROM designation_article 
	INNER JOIN article ON fk_article = id_article 
	WHERE id_article = '$_GET[id_product]'";
    $requete_pannier = requete($connexion_bdd, $sql);
    $paniers = retourne_ligne($requete_pannier);
	var_dump($paniers);
	
	// si le produit n'existe pas
	if(empty($paniers['fk_article'])) {
		die("ce produit n'existe pas");
	}
	$panier->add($paniers['fk_article']);
	die("le produit a bien été ajouté à votre panier,  <a href=\"javascript:history.back()\"> retournez sur le catalogue </a>");
	
}else {
	die("vous n'avez pas selectionné de produit à ajouter");
}



include "footer.php";  ?>