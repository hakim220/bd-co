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

 
?>


Bienvenue <?php echo htmlentities(trim($_SESSION['email'])); ?> !<br />
<?php 
					// récupération des informations concernant le membre
					$sql = "SELECT * FROM membres WHERE courriel= '$email'";
					$connexion_bdd = cree_connexion();
					$requete_page_membre = requete($connexion_bdd, $sql);
					$info_membre = retourne_ligne($requete_page_membre);
					
					var_dump($info_membre);
					
					// stockage de l'id et du pseudo du membre pour les réutiliser au cas où il remplirait le forum 

					$_SESSION['membre'] = $info_membre['id_membre'];
					$_SESSION['pseudo'] = $info_membre['pseudo'];
					echo $_SESSION['membre'];
					echo $_SESSION['pseudo'];
?>

<a href="index.php?menu=deconnexion">Déconnexion</a>

<br/>

<?php 
					// affichage des posts d'un membre sur le forum

					$sql2 = "SELECT * FROM forum_sujet
					INNER JOIN membres ON fk_membre = id_membre 
					WHERE fk_membre = '$_SESSION[membre]'
					";
					
					$requete_forum_membre = requete($connexion_bdd, $sql2);
					$posts_membre = retourne_tableau($requete_forum_membre);
					
					//var_dump($posts_membre);
					
					
					// requette pour recuperer le nombre de message qui a été publié pour un sujet donné
					$sql3 = "SELECT COUNT(*) FROM forum_message
					INNER JOIN forum_sujet 
					ON fk_sujet = id_forum_sujet
					WHERE forum_sujet.fk_membre = $_SESSION[membre]
					GROUP BY id_forum_sujet "
					;
					$requete_nombre_message = requete($connexion_bdd, $sql3);
				    $nombre_message = retourne_tableau($requete_nombre_message);
					
					
					
					
					$i=0;
					foreach ($posts_membre as $post) {
					?>
					<a href="index.php?sujet_forum=<?php echo $post['id_forum_sujet']; ?>"><?php echo $post['sujet']; ?></a>
					<span><?php echo $post['date_publication']; ?></span>
					
					<?php
						
					// on affiche le nombre de message posté pour chaque message !
					echo $nombre_message[$i]['COUNT(*)']." messages postés <br/>"; 
					$i++;
					
					}
					
					
					

?>



<?php include "footer.php";   ?>