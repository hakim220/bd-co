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


// faire des tableaux "dictionnaire" pour la gestion des petits trucs EN/FR qui ne sont pas en BDD
$message_recherche = array('en' => "Results for ", 'fr' =>"Résultats pour");
$message_resultat = array('en'=>"results", 'fr'=>"resultats");

$langue='fr';

?>	
<div id="content_mdr">
<?php	
	if(!empty($_GET['barre_recherche'])) {
			
		if(strlen($_GET['barre_recherche']) > 2) {
			// si l'utilisateur a entré un quelque chose dans le MDR et que cela fait plus de 2 caracteres

			$connexion_bdd = cree_connexion();
			
			$recherche = $_GET['barre_recherche'];
			$explode = explode(' ', $recherche);
	
			// on fait une recherche sur le nom de la série ou de la BD
			$sql = "SELECT * FROM designation_article 
			INNER JOIN series_bd ON id_series_bd = fk_serie_bd
			INNER JOIN article ON fk_article = id_article
			
			WHERE designation LIKE '%$recherche%'
			OR nom_serie LIKE '%$recherche%'
			";
		      
		    $requete_moteur = requete($connexion_bdd, $sql);
		    $resultat_moteur= retourne_tableau($requete_moteur);
			
			echo "<h1>{$message_recherche[$langue]} \"$recherche\",  ";
			echo count($resultat_moteur)." $message_resultat[$langue] : </h1>";


			//var_dump($resultat_moteur);
			
			foreach ($resultat_moteur as $resultat) {
			?>
				<article>
					<img src="<?php echo $resultat["lien_photo"] ?>" alt="image_bd" width="150px" height="190px"/>
					<h2><?php echo $resultat["designation"] ?></h2>
					<p><?php echo $resultat["prix_unitaire"] ?> €</p>
					<a class="bouton-bleu" href="index.php?fiche_produit=<?php echo $resultat["fk_article"] ?>">Voir le produit</a>
				</article>
			<?php	
			}
	
		}
		else {
			echo "<p>Votre recherche doit faire plus de 2 caracteres</p>";	
		}	
	}
	else {
		echo "<p>Il faut entrer un mot clé</p>";	
	}
?>
</div> <!-- fin content MDR -->

<?php	
include "footer.php";
?>