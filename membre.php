<?php
// Initialisations des sessions
include "session.php";


// Chargement des fonctions utiles
include "initialisations.php";


include "langue.php";

include "ousuisje.php";

include "connexion.php";


// Les header HTML sont chargés à part pour être un minimum dynamique
include "header.php";


$email = $_SESSION['email'];

/*
if (!isset($_SESSION['email'])) {
	header ('Location: index.php');
	exit();
}

else {
$connecte = true;
}
  */
 
?>


Bienvenue <?php echo htmlentities(trim($_SESSION['email'])); ?> !<br />
<?php 
					$sql = "SELECT * FROM membres WHERE courriel= '$email'";
					$connexion_page_membre = cree_connexion();
					$requete_page_membre = requete($connexion_page_membre, $sql);
					$info_membre = retourne_ligne($requete_page_membre);
					
					var_dump($info_membre);
					
					$_SESSION['membre'] = $info_membre['id_membre'];
					echo $_SESSION['membre'];
?>


<a href="index.php?menu=deconnexion">Déconnexion</a>
