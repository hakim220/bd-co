<a href="index.php?menu=forum_nouveau_sujet">Proposer un sujet</a>

<?php
// récupération des données de la table forum_sujet
	$sql = "SELECT * FROM forum_sujet 
	INNER JOIN  membres
	ON fk_membre = id_membre ";
    $connexion_bdd = cree_connexion();
    $requete_forum_sujet = requete($connexion_bdd, $sql);
    $forum_sujet = retourne_tableau($requete_forum_sujet);
    
   //var_dump($tous_evenements);
	
	
	
	// requette pour recuperer le nombre de message qui a été publié pour un sujet donné
	$sql2 = "SELECT COUNT(*) FROM forum_message
	INNER JOIN forum_sujet 
	ON fk_sujet = id_forum_sujet
	GROUP BY id_forum_sujet "
	;
	$requete_nombre_message = requete($connexion_bdd, $sql2);
    $nombre_message = retourne_tableau($requete_nombre_message);
	

	
	$i=0;
	foreach($forum_sujet as $un_sujet){
	?>
		<div class="un_evenement block-border">
			<a href="index.php?sujet_forum=<?php echo $un_sujet['id_forum_sujet']; ?>"><span><?php echo $un_sujet['sujet']; ?></span></a>
			<h2><?php echo $un_sujet['date_publication']; ?></h2>
			<p><?php echo $un_sujet['pseudo']; ?></p>
			<p><?php echo $nombre_message[$i]['COUNT(*)']." messages postés"; ?></p>
			</div>
	<?php
	$i++;
	}

?>