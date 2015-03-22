<?php
// Initialisations des sessions
include "session.php";


// Chargement des fonctions utiles
include "initialisations.php";


include "langue.php";

include "ousuisje.php";

include "connexion.php";



if($_SESSION['login']== true) {
	include "header.php";
	// récupération des informations concernant le membre
	$email = $_SESSION['email'];
					$sql = "SELECT * FROM membres WHERE courriel= '$email'";
					$connexion_bdd = cree_connexion();
					$requete_page_membre = requete($connexion_bdd, $sql);
					$info_membre = retourne_ligne($requete_page_membre);
					
					//var_dump($info_membre);
					
?>					
<div id="content_modif_info" class="block-border">
	<h2>Modifiez vos informations</h2>
					<form method="post" action="">
						<label>Pseudo</label><input type="text" name="pseudo"  id="pseudo"  value="<?php echo $info_membre['pseudo']; ?>" /> <br/>
						<label>Civilité</label>
						<select name="civilite">
							<option value="monsieur">Monsieur</option>
							<option value="madame">Madame</option>
						</select>  <br/>
						
						<label>Nom</label><input type="text"  id="nom" name="nom"  value="<?php echo $info_membre['nom']; ?>" /> <br/>
						<label>Prénom</label><input type="text" id="prenom" name="prenom"  value="<?php echo $info_membre['prenom']; ?>" /> <br/>
						<label>E-mail</label><input type="text" id="email" name="email" value="<?php echo $info_membre['courriel']; ?>" /> <br/>
						<input type="submit" name="modifier-infos" class="bouton-bleu" />
					</form>
	</div>
<?php 	
	if(isset($_POST['modifier-infos'])) {
		$pseudo = $_POST['pseudo'];
		$civilite = $_POST['civilite'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		
		
		
		$sql2 = "UPDATE membres SET pseudo = '$pseudo' , civilite= '$civilite' , nom = '$nom', prenom = '$prenom', courriel = '$email' WHERE id_membre ='$_SESSION[membre]'";
    
    	requete($connexion_bdd, $sql2);
		
	}



	include "footer.php";   
}
else {
	header("location: index.php");
}











?>