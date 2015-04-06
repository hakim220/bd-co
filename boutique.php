

<div id="les_filtres">
	<h2>Filtrez votre recherche</h2>	
</div>




<div id="les_bd">
	<h2>Nos BD</h2>
	<?php 
	$connexion_bdd = cree_connexion();
	$sql = "SELECT * FROM designation_article INNER JOIN  article ON fk_article = id_article";
	$requete_boutique = requete($connexion_bdd, $sql);
	$produits_boutique = retourne_tableau($requete_boutique);
	
	foreach($produits_boutique as $produit) {
		echo "<div class=\"produit\">
				<img src=\"$produit[lien_photo]\" alt=\"x\" width=\"140px\" height=\"165px\" />
				<h3>$produit[designation]</h3>
				<p>$produit[prix_unitaire] €</p>
				<a href=\"index.php?fiche_produit=$produit[id_designation_article]\" class=\"bouton-bleu\">Voir le produit</a>
			</div>";
		
	}
	
	
	
	?>
	
	
	
</div>