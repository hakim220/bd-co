<form method="post" action="">
	titre du sujet <input type="text"  name="titre_sujet"/>  <br/>
	Votre message<textarea name="message"></textarea> <br/>
		<input type="submit" name="publier_forum"/>
</form>


<?php 
if(isset($_POST['publier_forum'])) {
	if($_SESSION['login']== true) {
		$titre = $_POST['titre_sujet'];
		$message = $_POST['message'];
		
		$connexion_bdd = cree_connexion();
		$sql1 = "INSERT INTO forum_sujet VALUES('','$_SESSION[membre]','$titre','2015-03-08')";
		requete($connexion_bdd, $sql1);
	
	// recuperation du dernier id
		$last_id_requete  = "SELECT LAST_INSERT_ID() FROM forum_sujet";
    	$requete =  requete($connexion_bdd, $last_id_requete);
    	$ligne = retourne_ligne($requete);
	
		$last_id = array_values($ligne);
	
	//
	
		$sql2 = "INSERT INTO forum_message VALUES('','$last_id[0]','$_SESSION[membre]','$message','2015-03-08')";
		requete($connexion_bdd, $sql2);
	
	}
	else {
	?>
		<script>alert('il faut être membre pour publier sur le forum')</script>
	<?php
	}
	
	
}


?>