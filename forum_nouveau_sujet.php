
<?php 
if(isset($_POST['publier_forum'])) {

	if($_POST['titre_sujet'] && $_POST['message']) {
		if($_SESSION['login']== true) {
			$titre = $_POST['titre_sujet'];
			$message = $_POST['message'];
			$categorie_sujet = $_POST['categorie_sujet'];
			
			$connexion_bdd = cree_connexion();
			$sql1 = "INSERT INTO forum_sujet VALUES('','$_SESSION[membre]','$titre','$categorie_sujet','2015-03-08')";
			requete($connexion_bdd, $sql1);
		
		// recuperation du dernier id
			$last_id_requete  = "SELECT LAST_INSERT_ID() FROM forum_sujet";
	    	$requete =  requete($connexion_bdd, $last_id_requete);
	    	$ligne = retourne_ligne($requete);
		
			$last_id = array_values($ligne);
		
		//		
			$sql2 = "INSERT INTO forum_message VALUES('','$last_id[0]','$_SESSION[membre]','$_SESSION[pseudo]',\"$message\",'2015-03-08')";
			requete($connexion_bdd, $sql2);	
		}
		else {
		?>
			<script>alert('il faut être membre pour publier sur le forum')</script>
		<?php
		}
	} 
	else {
		echo "Il faut remplir tous les champs";
	}
}

?>
<div id="content_nouveau_sujet_forum" class="block-border">
	<h2>Poster un sujet sur le forum</h2>
	<form method="post" action="">
		<label for="titre_sujet">Titre du sujet</label> <input id="titre_sujet" type="text"  name="titre_sujet"/>  <br/>
		<label for="message">Votre message</label><textarea id="message" name="message"></textarea> <br/>
		<label for="categorie_message">Catégorie du message</label>  
		<select name="categorie_sujet" id="categorie_message">
			<option value="actualites">Actualités</option>
			<option value="bd">Trouver une BD</option>
			<option value="autres">Divers</option>
		</select> <br/>
		<input type="submit" name="publier_forum" class="bouton-bleu"/>
	</form>
</div> <!-- fin content_nouveau_sujet_forum --> 