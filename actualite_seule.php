<?php

// récupération des données de la table actualité et redacteur pour lier l'article à son auteur
	$sql = "SELECT * FROM actualite_seule 
	INNER JOIN redacteur_actualite ON
	fk_redacteur_article = id_redacteur_actualite
	WHERE id_actualite_seule= '$_GET[actualite]' 
	";
    $connexion_bdd = cree_connexion();
    $requete_actualite_seule = requete($connexion_bdd, $sql);
    $actualite_seule = retourne_tableau($requete_actualite_seule);
	
	
  //var_dump($actualite_seule);
  //var_dump($tous_evenements);
   
   foreach($actualite_seule as $actu){
	?>
		<div class="actualite_seule">
				<h2><?php echo $actu['titre'] ;?></h2>
				<img src="<?php echo $actu['photo'] ;?>" alt=""/> <br/>  <!-- width et height à retirer-->
				<span><?php echo $actu['legende_photo'] ;?></span>
				<p><?php echo $actu['texte'];  ?></p>
				
				<p class="couleur-bleu">
				<span> <?php echo "<a href='index.php?redacteur={$actu['id_redacteur_actualite']}&langue={$langue}'>" ?><?php echo 'par '. $actu['nom'] .' '. $actu['prenom'] ; ?></a></span>
				<span>, publié le <?php echo $actu['date_publication'] ;  ?></span>
				</p>
		</div>
	<ul class="socialcount" data-url="http://www.filamentgroup.com/" data-counts="true">
  		<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.filamentgroup.com/" title="Share on Facebook"><span class="count">Like</span></a></li>
  		<li class="twitter"><a href="https://twitter.com/intent/tweet?text=http://www.filamentgroup.com/" title="Share on Twitter"><span class="count">Tweet</span></a></li>
  		<li class="googleplus"><a href="https://plus.google.com/share?url=http://www.filamentgroup.com/" title="Share on Google Plus"><span class="count">+1</span></a></li>
	</ul>
	<?php
	}	
	// recupération de la catégorie de l'article pour proposer des articles complémentaire
	// on stocke aussi l'actu en cours pour ne pas la proposer dans les articles complémentaires
	$categorie = $actu['categorie_actualite'];
	$actu_en_cours = $actu['id_actualite_seule'];
	
	//echo $categorie;
	
	// récupération des données de la table actualité_seule
	$sql2 = "SELECT * FROM actualite_seule 
	WHERE categorie_actualite= '$categorie' AND id_actualite_seule != '$actu_en_cours'
	LIMIT 0,3
	";
    $requete_articles_complementaire = requete($connexion_bdd, $sql2);
    $articles_complementaire = retourne_tableau($requete_articles_complementaire);
	//var_dump( $articles_complementaire);
  
	// on affiche trois article complémentaires (limit 0,3)
		echo "<p class=\"actu_complementaire couleur-rouge\">Articles qui pourraient vous interesser :</p>";
		foreach($articles_complementaire as $article){
			
			 echo "<a href='index.php?actualite={$article['id_actualite_seule']}&langue={$langue}' >$article[titre]</a> <br/>"; 		
		}
 ?>