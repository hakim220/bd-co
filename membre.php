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

if(isset($_SESSION['login']) && $_SESSION['login']==true) {
$email = $_SESSION['email'];

?>


Bienvenue <?php echo htmlentities(trim($_SESSION['email'])); ?> !<br />
<?php 
					$sql = "SELECT * FROM membres WHERE courriel= '$email'";
					$connexion_page_membre = cree_connexion();
					$requete_page_membre = requete($connexion_page_membre, $sql);
					$info_membre = retourne_ligne($requete_page_membre);
					
					var_dump($info_membre);
?>


<a href="index.php?menu=deconnexion">Déconnexion</a>

<?php 

} else {
	// si un utilisateur tente d'acceder à la page membre alors qu'il n'est pas connecté, il sera redirigé
	header('Location: index.php');
	
}

include "footer.php";
?>
