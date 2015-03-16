


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
    
	
	
   var_dump($tous_messages);
	
	
	
	echo  $tous_messages[0]['sujet'] ;
?>

<a href="index.php?menu=forum">Retour au forum</a>

<?php	

	foreach ($tous_messages as $un_message) {
		?>
		<div class="un_evenement block-border">
			<!-- <p><?php echo $un_message['avatar-img']; ?></p>  --> 
			<p><?php echo $un_message['pseudo']; ?></p>
			<p><?php echo $un_message['message']; ?></p>
			<p><?php echo $un_message['date_post']; ?></p>
			</div>
	<?php
	}
	
	
	
?>



<form method="post" action="">
	<textarea name="reponse"></textarea>	
	<input type="submit" name="reponse-forum" />
</form>

<?php 
	if(isset($_POST['reponse-forum'])) {
		if($_SESSION['login'] == true) {
			$reponse = $_POST['reponse'];
			$sujet = $_GET['sujet_forum'];
					
				
			$sql3 = "INSERT INTO forum_message VALUES('','$sujet','$_SESSION[membre]','$reponse','2015-03-08')";
			requete($connexion_bdd, $sql3);
		}	
		else {
		?>
		<script>alert("il faut etre membre pour repondre");</script>
		<?php
			
		}
			
		
	}
	
?>



