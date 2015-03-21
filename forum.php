	<div id="forum">
<a class='bouton-bleu filtre' href="index.php?menu=forum_nouveau_sujet">Proposer un sujet</a>
<br/>

<?php

// récupération des données de la table catégories_forum
	$sql1 = "SELECT * FROM categories_forum WHERE langue = '$langue'";
    $connexion_bdd = cree_connexion();
    $requete_filtrage = requete($connexion_bdd, $sql1);
    $boutons_filtrage = retourne_tableau($requete_filtrage);

// Affichage des boutons qui vont permettre de filtrer le forum par catégories
	
	echo "<a href='index.php?menu=forum&langue=$langue' class='bouton-rouge filtre'>Tous sujets</a>\n";
	foreach($boutons_filtrage as $filtrage){
		echo "<a href='index.php?menu=forum&categorie={$filtrage['type']}' class='bouton-rouge filtre'>{$filtrage['designation_type']}</a>\n";
	}

echo "</div>";
	$WHERE = '';
	if(isset($_GET['categorie'])) {
		$WHERE = "WHERE categorie_sujet ='{$_GET['categorie']}'";
	}



// récupération des données de la table forum_sujet avec le filtre ($WHERE)
	$sql2 = "SELECT * FROM forum_sujet 
	INNER JOIN  membres
	ON fk_membre = id_membre
	$WHERE";
    $connexion_bdd = cree_connexion();
    $requete_forum_sujet = requete($connexion_bdd, $sql2);
    $forum_sujet = retourne_tableau($requete_forum_sujet);
    
   //var_dump($tous_evenements);
	
	
	
	// requette pour recuperer le nombre de message qui a été publié pour un sujet donné
	$sql2 = "SELECT COUNT(*) FROM forum_message
	INNER JOIN forum_sujet 
	ON fk_sujet = id_forum_sujet
	$WHERE
	GROUP BY id_forum_sujet "
	;
	$requete_nombre_message = requete($connexion_bdd, $sql2);
    $nombre_message = retourne_tableau($requete_nombre_message);
	

	
	$i=0;
	foreach($forum_sujet as $un_sujet){
	?>
		<div class="post-forum block-border">
			<a href="index.php?sujet_forum=<?php echo $un_sujet['id_forum_sujet']; ?>" class="couleur-bleu"><span><?php echo $un_sujet['sujet']; ?></span></a> <br/>
			<span>Par <?php echo $un_sujet['pseudo']; ?></span> <br/> 
			<span>Le <?php echo $un_sujet['date_publication']; ?></span> 
			<span><?php echo $nombre_message[$i]['COUNT(*)']." messages postés"; ?></span>
			</div>
	<?php
	$i++;
	}

?>