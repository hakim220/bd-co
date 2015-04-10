
<?php
// récupération des données pour l'affichage des post sur un forum (membre, sujet, et posts)
	$sql = "SELECT * FROM 
	forum_message INNER JOIN forum_sujet ON fk_sujet = id_forum_sujet
	INNER JOIN membres ON forum_sujet.fk_membre = id_membre
	WHERE fk_sujet = '$_GET[sujet_forum]'
	";

    $connexion_bdd = cree_connexion();
    $requete_tous_messages = requete($connexion_bdd, $sql);
    $tous_messages = retourne_tableau($requete_tous_messages);
    
	
	
   //var_dump($tous_messages);
	
	// Affichage du titre du sujet ainsi que de la catégorie
?>	
	<div id="content_forum_sujet">
		<h2><?php echo $tous_messages[0]['sujet'] ;
			
			echo " (". $tous_messages[0]['categorie_sujet']. ")" ;
			?>
		</h2>  
		
	<!-- <a href="index.php?menu=forum" class="bouton-rouge">Retour au forum</a> -->
	
		
		<br/>

<?php	

	foreach ($tous_messages as $un_message) {
		?>
		<div class="un_post_forum block-border">
			<div>
				<img src="<?php echo $un_message['avatar_img']; ?>" alt="avatar" class="avatar"/> <br/>		  
				<p><?php echo $un_message['pseudo_membre']; ?></p>
			</div>
			<p><?php echo $un_message['message']; ?></p>
			
			<?php 	
				// gestion de la date avec heure et minute au format FR
				$timestamp = strtotime($un_message['date_post']); 
				$dateFr = date("d/m/Y à H:i ",$timestamp) ;
			?>
		
		
			<p>Le <?php echo $dateFr ; ?></p>
		
		
		</div>
	<?php
	}
	
	
	
?>

<span>------</span> <br/>
<p>Participer à la discussion</p>
<form method="post" action="">
	<textarea name="reponse"></textarea>	<br/>
	<input type="submit" name="reponse-forum"  class="bouton-bleu"/>
</form>

<?php 
	if(isset($_POST['reponse-forum'])) {
		if($_POST['reponse']) {
			if($_SESSION['login'] == true) {
			$reponse = $_POST['reponse'];
			$sujet = $_GET['sujet_forum'];
					
			//Gestion de la date pour l'insertion en BDD lors du post d'un nouveau message
			$now = time('now') ;
			$dateFr = date("Y-m-d H:i:s",$now) ;
			
			$sql3 = "INSERT INTO forum_message VALUES('','$sujet','$_SESSION[membre]','$_SESSION[pseudo]',\"$reponse\",'$dateFr')";
			requete($connexion_bdd, $sql3);
			}	
			else {
			?>
			<script>alert("il faut etre membre pour repondre");</script>
			<?php
			}
		}
		else {
			echo "Il faut remplir le champs";
		}
	}
	
?>

</div> <!-- fin content forum sujet -->

