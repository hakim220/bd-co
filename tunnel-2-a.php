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
			<li class="etape_en_cours">2) Information et livraison</li>
			<li class="autre_etape">3) Paiement</li>
		</ul>
	</div> <!-- fin etape -->

<?php

if(!empty($_SESSION['panier']) && $_SESSION['total'] > 0 && $_SESSION['login']==true) {
	// si on a un pannier qui n'est pas vide, qui est superieur à 0 et que le membre est bien connecté, on continue
	
	$email = $_SESSION['email'];
	
				// on recupere toutes les informations concernant le membre
					$sql = "SELECT * FROM membres WHERE courriel= '$email'";
					$connexion_bdd = cree_connexion();
					$requete_page_membre = requete($connexion_bdd, $sql);
					$info_membre = retourne_ligne($requete_page_membre);

	//var_dump($info_membre);
?>
	<div class="info_livraison">
			<h2 class="text_center">Vos informations de livraison</h2>
		<form method="post" action="">
			<label>Civilité : </label> 
			<label for="monsieur">Monsieur</label><input id="monsieur" type="radio" name="civilite" value="monsieur" <?php if($info_membre["civilite"] == 'monsieur') { echo "checked=\"checked\"" ;} ?>/>
			<label for="madame">Madame</label> <input id="madame" type="radio" name="civilite" value="madame" <?php if($info_membre["civilite"] == 'madame') { echo "checked=\"checked\"" ;} ?>/>
			<br/>
			
			
			<label for="nom">Nom</label><input id="nom" type="text" name="nom"  value="<?php echo $info_membre["nom"]; ?>"/> <br/>	
			<label for="prenom">Prenom</label><input id="prenom" type="text" name="prenom"  value="<?php echo $info_membre["prenom"]; ?>"/>	 <br/>
			<label for="email">E-mail</label><input id="email" type="text" name="courriel"  value="<?php echo $info_membre["courriel"]; ?>"/>	 <br/>
			<p class="gras">Adresse de facturation</p> 
			<label for="adresse">Adresse</label><input id="adresse" type="text" name="adresse"  value="<?php echo $info_membre["adresse"]; ?>"/>	<br/>
			<label for="cp">Code postal</label><input id="cp" type="text" name="code_postal"  value="<?php echo $info_membre["code_postal"]; ?>"/> <br/>
			<label for="ville">Ville</label><input id="ville" type="text" name="ville"  value="<?php echo $info_membre["ville"]; ?>"/> <br/>
			
			<p class="gras">Adresse de livraison</p>
			<label for="adresse_l">Adresse</label><input id="adresse_l" type="text" name="adresse_livraison"  value="<?php echo $info_membre["adresse_livraison"]; ?>"/>	 <br/>
			<label for="codepostal_l">Code postal</label><input id="codepostal_l" type="text" name="code_postal_livraison"  value="<?php echo $info_membre["code_postal_livraison"]; ?>"/> <br/>
			<label for="ville_l">Ville</label><input id="ville_l" type="text" name="ville_livraison"  value="<?php echo $info_membre["ville_livraison"]; ?>"/> <br/>
			<input type="submit" name="valider" class="bouton-bleu"/>
		</form>
	</div>  <!-- fin info livraison -->
<?php
	if(isset($_POST["valider"])) {
			
			// on recupere toutes les informations du formulaire dans des variables
		$sexe = $_POST['civilite'];
		$nom = $_POST["nom"]; $nom = strip_tags($nom); $nom = htmlspecialchars($nom);
		$prenom = $_POST["prenom"]; $prenom = strip_tags($prenom); $prenom = htmlspecialchars($prenom);
		$courriel = $_POST["courriel"]; $courriel = strip_tags($courriel); $courriel = htmlspecialchars($courriel);
		$adresse = $_POST["adresse"]; $adresse = strip_tags($adresse); $adresse = htmlspecialchars($adresse);
		$code_postal = $_POST["code_postal"]; $code_postal = strip_tags($code_postal); $code_postal = htmlspecialchars($code_postal);
		$ville = $_POST["ville"]; $ville = strip_tags($ville); $ville = htmlspecialchars($ville);
		$adresse_livraison = $_POST["adresse_livraison"]; $adresse_livraison = strip_tags($adresse_livraison); $adresse_livraison = htmlspecialchars($adresse_livraison);
		$code_postal_livraison = $_POST["code_postal_livraison"]; $code_postal_livraison = strip_tags($code_postal_livraison); $code_postal_livraison = htmlspecialchars($code_postal_livraison);
		$ville_livraison = $_POST["ville_livraison"]; $ville_livraison = strip_tags($ville_livraison); $ville_livraison = htmlspecialchars($ville_livraison);
	
		if($nom && $prenom && $courriel && $adresse && $code_postal && $ville  &&  $adresse_livraison  && $code_postal_livraison && $ville_livraison) {
						
				$sql2 = "UPDATE membres SET 
				nom = '$nom',
				prenom = '$prenom',
				civilite = '$sexe',
				courriel = '$courriel',
				adresse = '$adresse',
				code_postal = '$code_postal',
				ville = '$ville',
				adresse_livraison = '$adresse_livraison',
				code_postal_livraison = '$code_postal_livraison',
				ville_livraison = '$ville_livraison'
				
				WHERE courriel= '$email'";
				
				$requete_info_acheteur = requete($connexion_bdd, $sql2);
				header("location: tunnel-3.php");
				
		}
		else {
			echo "Il manque des infos";
		}

	}
	else {}

}
else {
	header("location: index.php");
	
}
include "footer.php";

?>

