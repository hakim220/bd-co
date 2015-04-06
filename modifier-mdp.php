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
	
	
?>
<div id="modif-mdp" class="block-border">
	<div>
		<h2>Changez votre mot de passe</h2>
		<form method="post" action="">
			<label for="mdp_actuel">Mot de passe actuel</label><input id="mdp_actuel" name="mdp_actuel" type="password" /> <br/>
			<label for="new_mdp">Nouveau mot de passe</label><input id="new_mdp" type="password" name="new_mdp"  /> <br/>
			<label for="repeat_new_mdp">Repetez votre nouveau mot de passe</label><input id="repeat_new_mdp" name="repeat_new_mdp" type="password" /> <br/>
			<input type="submit" name="valider" class="bouton-bleu"/>
		</form>
	</div>
</div> <!-- fin modif mdp -->
	
<?php









//var_dump($mot_de_passe_actuel);

	if(isset($_POST['valider'])) {
		$ancien_mdp = md5($_POST['mdp_actuel']);
		$new_mdp = $_POST['new_mdp'];
		$repeat_new_mdp = $_POST['repeat_new_mdp'];
		
		// récupération du mot de passe actuel
		$sql = "SELECT password FROM membres WHERE id_membre= '$_SESSION[membre]'";
		$connexion_bdd = cree_connexion();
		$requete_password = requete($connexion_bdd, $sql);
		$mot_de_passe_actuel = retourne_ligne($requete_password);
		
		
	
		if($ancien_mdp == $mot_de_passe_actuel['password'] ) {
			if($new_mdp == $repeat_new_mdp) {
				// si tout est ok, on insere le nouveau mot de passe dans la BDD
				$new_mdp = md5($new_mdp);
				$sql2 = "UPDATE membres SET password = '$new_mdp' WHERE id_membre ='$_SESSION[membre]'";
    			requete($connexion_bdd, $sql2);
    			echo "Le mot de passe a bien été changé";
			}
			else {
				echo "Les nouveaux mots de passe ne sont pas identiques";
			}
		}
		else {
			echo "Le mot de passe entré n'est pas celui que vous avez actuellement";
			
		}

	}




	include "footer.php";   
}
else {
	header("location: index.php");
}












?>