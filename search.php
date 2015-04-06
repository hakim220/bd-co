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
	
	
	
	
	
	
	
	
	
	if(!empty($_GET['barre_recherche'])) {
			
		if(strlen($_GET['barre_recherche']) > 2) {
			
			$connexion_bdd = cree_connexion();
			
			$recherche = $_GET['barre_recherche'];
			$explode = explode(' ', $recherche);
			
			
			
			// on fait une recherche sur le nom de la série ou de la BD
			$sql = "SELECT * FROM designation_article 
			INNER JOIN series_bd ON id_series_bd = fk_serie_bd
			
			WHERE designation LIKE '%$recherche%'
			OR nom_serie LIKE '%$recherche%'
			";
		      
		    $requete_moteur = requete($connexion_bdd, $sql);
		    $resultat_moteur= retourne_tableau($requete_moteur);
			
			echo "resultat de la recherce pour $recherche ";
			var_dump($resultat_moteur);
			
			echo count($resultat_moteur);
				
			
			
			
		}
		else {
			echo "Votre recherche doit faire plus de 2 caracteres";
			
		}
		
	}
	else {
		echo "Il faut entrer un mot clé";
		
	}
	
	



include "footer.php";
?>