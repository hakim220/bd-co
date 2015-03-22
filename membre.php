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
<div id="membre_content" class="block-border">
<h2>Bienvenue <?php echo htmlentities(trim($_SESSION['email'])); ?> !</h2>
<div id="infos_membre">
<?php 
					// récupération des informations concernant le membre
					$sql = "SELECT * FROM membres WHERE courriel= '$email'";
					$connexion_bdd = cree_connexion();
					$requete_page_membre = requete($connexion_bdd, $sql);
					$info_membre = retourne_ligne($requete_page_membre);
					
					//var_dump($info_membre);					
?>					
					<form method="post" action="">
						<label>Pseudo</label><input type="text"  id="pseudo" disabled value="<?php echo $info_membre['pseudo']; ?>" /> <br/>
						<label>Civilité</label><input type="text"  id="pseudo" disabled value="<?php echo $info_membre['civilite']; ?>" /> <br/>
						<label>Nom</label><input type="text"  id="pseudo" disabled value="<?php echo $info_membre['nom']; ?>" /> <br/>
						<label>Prénom</label><input type="text" id="pseudo" disabled value="<?php echo $info_membre['prenom']; ?>" /> <br/>
						<label>E-mail</label><input type="text" id="pseudo" disabled value="<?php echo $info_membre['courriel']; ?>" />	 <br/>
					</form>
					<a href="modifier-mdp.php" class="bouton-bleu">Modifier votre mot de passe</a>
					<a href="modifier-infos.php" class="bouton-bleu">Modifier vos informations</a>
					<br/>				
<?php				
					// stockage de l'id et du pseudo du membre pour les réutiliser au cas où il remplirait le forum 
					$_SESSION['membre'] = $info_membre['id_membre'];
					$_SESSION['pseudo'] = $info_membre['pseudo'];
					//echo $_SESSION['membre'];
					//echo $_SESSION['pseudo'];
?>

</div> <!-- fin infos membres -->

<br/>
<div id="posts_forum">
<?php 
					// affichage des posts d'un membre sur le forum
					$sql2 = "SELECT * FROM forum_sujet
					INNER JOIN membres ON fk_membre = id_membre 
					WHERE fk_membre = '$_SESSION[membre]' ";
					$requete_forum_membre = requete($connexion_bdd, $sql2);
					$posts_membre = retourne_tableau($requete_forum_membre);
					
					//var_dump($posts_membre);
					// requette pour recuperer le nombre de message qui a été publié pour un sujet donné
					$sql3 = "SELECT COUNT(*) FROM forum_message
					INNER JOIN forum_sujet 
					ON fk_sujet = id_forum_sujet
					WHERE forum_sujet.fk_membre = $_SESSION[membre]
					GROUP BY id_forum_sujet ";
					$requete_nombre_message = requete($connexion_bdd, $sql3);
				    $nombre_message = retourne_tableau($requete_nombre_message);
					
					echo "<br/>"; echo "<br/>";
					
					echo "<h2>Vos posts sur le Forum</h2>";
					echo "<br/>";
					
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
</div> <!--fin post forum-->
<a href="index.php?menu=deconnexion" class="bouton-rouge">Déconnexion</a>
</div> <!--fin membre_content -->
<?php include "footer.php";   ?>