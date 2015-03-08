<?php 

// récupération des données de la table actualite seule et lien avec le redacteur de l'article
	$sql = "SELECT * FROM actualite_seule
	INNER JOIN redacteur_actualite ON
	fk_redacteur_article = id_redacteur_actualite
	WHERE categorie_actualite = 'interview'
	ORDER BY date_publication DESC "; // à voir une modification de la requete pour la langue
    $connexion_bdd = cree_connexion();
    $requete_actualites_interviews = requete($connexion_bdd, $sql);
    $actualites_interviews = retourne_tableau($requete_actualites_interviews);
	
	
  //var_dump($actualites_interviews);
  //var_dump($tous_evenements);
   
   foreach($actualites_interviews as $interview){
	?>
		<div class="une_actualite">
			<div class="photo_miniature">
				<img src="<?php echo $interview['photo_miniature'] ;?>" alt="" width="150px" height="150px"/>  <!-- width et height à retirer-->
			</div>
			<div class="content_actualite">
				<h2><?php echo $interview['titre'] ;?></h2>
				<span> <?php echo "<a href='index.php?redacteur={$interview['id_redacteur_actualite']}&langue={$langue}'>" ?><?php echo 'par '. $interview['nom'] .' '. $interview['prenom'] ; ?></a></span>
				<span>le <?php echo $interview['date_publication'] ;  ?></span>
				<span class="couleur-rouge"><?php echo $interview['categorie_actualite'] ;  ?></span>
				<p><?php echo substr($interview['texte'],0,200).'...' ;  ?></p>
				<?php echo "<a class=\"lire_suite bouton-rouge\" href='index.php?actualite={$interview['id_actualite_seule']}&langue={$langue}' >Lire la suite</a>"; ?>
			
			</div>
		</div>
		
	<?php
	}
 ?>