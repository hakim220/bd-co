<?php
// Initialisations des sessions
include "session.php";


// Chargement des fonctions utiles
include "initialisations.php";

include "langue.php";

include "ousuisje.php";

include "connexion.php";
?>
<!doctype html>
<html lang="fr">
<head>
	  <meta charset="utf-8">
	  <title>Bd-co.com</title>
	  <link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/tunnel.css">
	
</head>
	
<body>
	<?php include("header_tunnel.php"); ?>
	<div class="wrapper">
	<div class="etape">
		<ul>
			<li class="autre_etape">1) Identification</li>
			<li class="autre_etape">2) Information et livraison</li>
			<li class="etape_en_cours">3) Paiement</li>
		</ul>
	</div> <!-- fin etape -->
	<div class="info_livraison">
<?php

echo $_SESSION['total'];

$ids = array_keys($_SESSION['panier']);

$connexion_bdd = cree_connexion();
	$sql = 'SELECT * FROM designation_article 
	INNER JOIN article ON fk_article = id_article 
	WHERE fk_article IN ('.implode(',',$ids).')';
       
    $requete_produits_ajoutes = requete($connexion_bdd, $sql);
    $produits_ajoutes= retourne_tableau($requete_produits_ajoutes);
	var_dump($produits_ajoutes);

	foreach ($produits_ajoutes as $produit) {
		//echo "<img src='$produit['lien_photo']'/>";
		echo $produit["designation"];
		// affichage de la quantité pour un produit précis !
		echo $_SESSION["panier"][$produit["fk_article"]];
		echo "<br/>";
	}
?>
<p><a href="#" class="bouton-bleu">Passer au paiement Paypal</a></p>
</div>
