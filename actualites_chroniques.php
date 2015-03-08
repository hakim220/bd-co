<?php 

// récupération des données de la table actualite seule et lien avec le redacteur de l'article
	$sql = "SELECT * FROM actualite_seule
	INNER JOIN redacteur_actualite ON
	fk_redacteur_article = id_redacteur_actualite
	WHERE categorie_actualite = 'chronique'
	ORDER BY date_publication DESC "; // à voir une modification de la requete pour la langue
    $connexion_bdd = cree_connexion();
    $requete_actualites_chroniques = requete($connexion_bdd, $sql);
    $actualites_chroniques = retourne_tableau($requete_actualites_chroniques);
	
  //var_dump($actualites_chroniques);
  //var_dump($tous_evenements);
   
   foreach($actualites_chroniques as $chronique){
	?>
		<div class="une_actualite">
			<div class="photo_miniature">
				<img src="<?php echo $chronique['photo_miniature'] ;?>" alt="" width="150px" height="150px"/>  <!-- width et height à retirer-->
			</div>
			<div class="content_actualite">
				<h2><?php echo $chronique['titre'] ;?></h2>
				<span> <?php echo "<a href='index.php?redacteur={$chronique['id_redacteur_actualite']}&amp;langue={$langue}'>" ?><?php echo 'par '. $chronique['nom'] .' '. $chronique['prenom'] ; ?></a></span>
				<span>le <?php echo $chronique['date_publication'] ;  ?></span>
				<span class="couleur-rouge"><?php echo $chronique['categorie_actualite'] ;  ?></span>
				<p><?php echo substr($chronique['texte'],0,200).'...' ;  ?></p>
				<?php echo "<a  class=\"lire_suite bouton-rouge\" href='index.php?actualite={$chronique['id_actualite_seule']}&amp;langue={$langue}' >Lire la suite</a>"; ?>
			</div>
		</div>	
	<?php
	}

 ?>