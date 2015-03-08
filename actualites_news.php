<?php 

// récupération des données de la table actualite seule et lien avec le redacteur de l'article
	$sql = "SELECT * FROM actualite_seule
	INNER JOIN redacteur_actualite ON
	fk_redacteur_article = id_redacteur_actualite
	WHERE categorie_actualite = 'news'
	ORDER BY date_publication DESC "; // à voir une modification de la requete pour la langue
    $connexion_bdd = cree_connexion();
    $requete_actualites_news = requete($connexion_bdd, $sql);
    $actualites_news = retourne_tableau($requete_actualites_news);
	
  //var_dump($actualites_news);
  //var_dump($tous_evenements);
   
   foreach($actualites_news as $news){
	?>
		<div class="une_actualite">
			<div class="photo_miniature">
				<img src="<?php echo $news['photo_miniature'] ;?>" alt="" width="150px" height="150px"/>  <!-- width et height à retirer-->
			</div>
			<div class="content_actualite">
				<h2><?php echo $news['titre'] ;?></h2>
				<span><?php echo "<a href='index.php?redacteur={$news['id_redacteur_actualite']}&langue={$langue}'>" ?><?php echo 'par '. $news['nom'] .' '. $news['prenom'] ; ?></a></span>
				<span>le <?php echo $news['date_publication'] ;  ?></span>
				<span class="couleur-rouge"> <?php echo $news['categorie_actualite'] ;  ?></span>
				<p><?php echo substr($news['texte'],0,200).'...' ;  ?></p>
				<?php echo "<a class=\"lire_suite bouton-rouge\" href='index.php?actualite={$news['id_actualite_seule']}&langue={$langue}' >Lire la suite</a>"; ?>
			
			</div>
		</div>
			
	<?php
	}
 
 ?>