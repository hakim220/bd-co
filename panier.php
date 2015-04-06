<!doctype html>
<html lang="fr">

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

// suppression d'un produit
if(isset($_GET['del'])) {
	
	$panier->del($_GET['del']);
}

var_dump($_SESSION);

	$ids = array_keys($_SESSION['panier']);

	// si on a pas de produit qui ont été ajoutés, on aura pas l'erreur de la requete sql puisque on defini un tableau vide ici
	if(empty($ids)) {	
		$produits_ajoutes =array();
	}
	else {
		$connexion_bdd = cree_connexion();
		$sql = 'SELECT * FROM designation_article 
		INNER JOIN article ON fk_article = id_article 
		WHERE fk_article IN ('.implode(',',$ids).')';
	       
	    $requete_produits_ajoutes = requete($connexion_bdd, $sql);
	    $produits_ajoutes= retourne_tableau($requete_produits_ajoutes);
		//var_dump($produits_ajoutes);
	}

?>
<div id="page_panier">
<div class="content_panier">
	<form method="post" action="">

	<table>
		<thead>
			<tr>
				<th>Quantite</th>
				<th>Article(s)</th>
				<th>Prix Unitaire</th>
				<th>Suppression</th>	
			</tr>
		</thead>
		<tbody>
<?php

foreach( $produits_ajoutes as $produit){

?>
			<tr>
				<?php 
				//  on stocke ici l'id du produit pour l'utiliser dans le systeme de quantité
				$id_produit = $produit['fk_article']; 
				?>
				<td><input type="text" name="panier[quantite][<?php echo $id_produit ?>]" value="<?php echo $_SESSION['panier'][$id_produit]; ?>" /></td>
				<td>
					<img src="<?php echo $produit['lien_photo']; ?>" alt="xx"width="100px" height="100px"/>
					<?php echo $produit['designation'];?>1
				</td>
				<td><?php echo $produit['prix_unitaire']; ?> euros</td>
				<td><a href="panier.php?del=<?php echo  $produit['fk_article']; ?>"><img src="img-maquette/picto-suppression.png" alt="icone suppression"/></a></td>
			</tr>

<?php
	

} // fin du foreach pour afficher tous les produits du panier

if($panier->total() == 0) {
		$prix_ht = 0;
	}
	else {
		$prix_ht = $panier->total() - (($panier->total() / 100) *20);
	}
?>
		</tbody>
		<tfoot></tfoot>
	</table>
		<input type="submit" name="recalculer" value="recalculer" class="bouton-bleu"/>
	</form>
</div> <!--fin content panier -->
	<p><a href="#" class="bouton-rouge">Vider le panier</a></p>
	
	<div class="recap_livraison">
		<p>Paiement sécurisé paypal</p>
		<p>Livraison à domicile offerte</p>
	</div>


	<div class="recap_prix">
		<p>Nombre de produits : <?php echo $panier->count_panier() ;?> </p>
		<p>Total HT :  <?php echo  round($prix_ht,2) ;?> euros </p>
		<p>Total à payer TTC : <?php echo $panier->total() ;?>euros </p>
	</div>
	<div class="clear"></div>

<?php
// voir à partir de 44 min si on veut quelque chose dans le header

$_SESSION['total'] = $panier->total();
 echo "<p ><a href=\"index.php?menu=boutique\" class=\"bouton-bleu clear \">Poursuivre vos achats</a></p>";
if( !empty($_SESSION['panier']) && $_SESSION['total'] > 0 ) {
	echo "<br/>
	
	<p><a href=\"tunnel-1.php\" class=\"bouton-bleu clear \">Passer la commande</a></p>";
	
}else {
	// si on a un panier qui n'est pas vide et un total > à 0 on a le bouton pour passer la commande, sinon, on ne fait rien
}
?>
</div> <!-- fin page panier -->
<?php
include "footer.php";  
?> 