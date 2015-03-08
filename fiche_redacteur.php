<?php

// récupération des données de la table redacteur article et lien avec les articles qu'ils ont ecrits
	$sql = "SELECT * FROM redacteur_actualite 
	INNER JOIN actualite_seule ON id_redacteur_actualite = fk_redacteur_article
	WHERE id_redacteur_actualite = '$_GET[redacteur]'";
    $connexion_bdd = cree_connexion();
    $requete_redacteur = requete($connexion_bdd, $sql);
    $redacteurs = retourne_ligne($requete_redacteur);
	
	$page_auteur  =  $redacteurs['id_redacteur_actualite'];
  
  //var_dump($redacteurs );
  //var_dump($tous_evenements);
 
  ?>
  <div id="content_redacteur">
	<h2><?php echo $redacteurs['nom'] ." ". $redacteurs['prenom'] ?></h2>
	<img src="<?php echo $redacteurs['photo_redacteur'] ?>" alt=""/>
	<p><?php echo $redacteurs['resume'] ?></p>
	<p><span class="couleur-bleu">E-mail: </span><?php echo $redacteurs['email'] ?></p>
 
 <p class="article_auteur couleur-rouge">Les articles de cet auteur :</p>
  <?php
  
  // requete pour avoir des articles écrits par cet auteur
	$sql2 = "SELECT * FROM redacteur_actualite 
	INNER JOIN actualite_seule ON id_redacteur_actualite = fk_redacteur_article
	WHERE '$page_auteur' = fk_redacteur_article
	LIMIT 0,3"; // à voir pour le multilingue...
    $connexion_bdd = cree_connexion();
    $requete_article_ecrit = requete($connexion_bdd, $sql2);
    $article_ecrit = retourne_tableau($requete_article_ecrit);
	
	//var_dump($article_ecrit);

	foreach($article_ecrit as $article) {
		 echo "<a href='index.php?actualite={$article['id_actualite_seule']}&amp;langue={$langue}' >- $article[titre]</a><br/>"; 
	}
  
  ?>



 </div>

 