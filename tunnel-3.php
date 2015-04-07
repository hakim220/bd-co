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
			<li class="etape_en_cours">3) Récapitulatif et paiement</li>
		</ul>
	</div> <!-- fin etape -->
	
	<div class="content_tunnel3">
		<table class="tableau_paiement">
			<thead>
				<tr>
					<th>Article(s)</th>
					<th>Prix Unitaire</th>
					<th>Quantite</th>
				</tr>
			</thead>
			<tbody>
<?php

$ids = array_keys($_SESSION['panier']);

$connexion_bdd = cree_connexion();
	$sql = 'SELECT * FROM designation_article 
	INNER JOIN article ON fk_article = id_article 
	WHERE fk_article IN ('.implode(',',$ids).')';
       
    $requete_produits_ajoutes = requete($connexion_bdd, $sql);
    $produits_ajoutes= retourne_tableau($requete_produits_ajoutes);
	
	//var_dump($produits_ajoutes);

	foreach ($produits_ajoutes as $produit) {
	?>	
	<tr>
		<td class="produit_recap"> <img src="<?php echo  $produit['lien_photo'] ?>" alt="photo bd" width="90" height="120"/> <p><?php echo $produit["designation"]; ?> </p></td>
		<td><p><?php echo  $produit['prix_unitaire'] ?> € </p></td>
		<!--  affichage de la quantité pour un produit précis !  -->
		<td> <p><?php echo $_SESSION["panier"][$produit["fk_article"]];  ?></p> </td>
	</tr>
	<?php
	}
?>
		</tbody>
		<tfoot>
			<tr>
				<td class="gras">Total TTC</td>
				<td></td>
				<td class="gras"><?php echo $_SESSION['total']; ?> € </td>
			</tr>
		</tfoot>
	</table>
	<p class="text_center"><a href="#" class="bouton-bleu">Passer au paiement Paypal</a></p>
</div> <!-- fin info_livraison -->

<?php include("footer.php") ?>