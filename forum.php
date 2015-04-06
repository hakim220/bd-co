	<div id="forum">
<a class='bouton-bleu filtre' href="index.php?menu=forum_nouveau_sujet">Proposer un sujet</a>
<br/>

<?php
$connexion_bdd = cree_connexion();
/* systeme de pagination */

// on récupére le nombre total de sujet
$sql4 = "SELECT COUNT(id_forum_sujet) as nbrSujet FROM forum_sujet";
$requete_nombre_sujet = requete($connexion_bdd, $sql4);
$nombre_sujet = retourne_ligne($requete_nombre_sujet);


//var_dump($nombre_sujet);
$nbrSujet = $nombre_sujet['nbrSujet'];
//echo $nbrSujet;

// on veut 5 sujet par page
$parPage = 5;
//on arrondi au nombre supérieur pour éviter les nombres à virgule
$nbrPages = ceil($nbrSujet/$parPage);
if(isset($_GET['categorie'])) {
	$sql5 = "SELECT COUNT(id_forum_sujet) as nbrSujet FROM forum_sujet WHERE categorie_sujet = '$_GET[categorie]'";
	$requete_nombre_sujet = requete($connexion_bdd, $sql5);
	$nombre_sujet = retourne_ligne($requete_nombre_sujet);
	
	$nbrSujet = $nombre_sujet['nbrSujet'];
	$nbrPages = ceil($nbrSujet/$parPage);

}



echo $nbrPages;

// on check sur quel page on se trouve pour afficher les article correspondant
if(isset($_GET['page']) && $_GET['page'] >0 && $_GET['page'] <= $nbrPages) {
	$pageCourante = $_GET['page'];
}
else {
	$pageCourante = 1;
}

// fin pagination


// récupération des données de la table catégories_forum
	$sql1 = "SELECT * FROM categories_forum WHERE langue = '$langue'";
    
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










// récupération des données de la table forum_sujet avec le filtre ($WHERE) et la limitation
	$sql2 = "SELECT * FROM forum_sujet 
	INNER JOIN  membres
	ON fk_membre = id_membre
	$WHERE
	LIMIT ".(($pageCourante-1)*$parPage).", $parPage
	";
    $connexion_bdd = cree_connexion();
    $requete_forum_sujet = requete($connexion_bdd, $sql2);
    $forum_sujet = retourne_tableau($requete_forum_sujet);
    
   //var_dump($tous_evenements);
	
	
	
	// requette pour recuperer le nombre de message qui a été publié pour un sujet donné
	$sql3 = "SELECT COUNT(*) FROM forum_message
	INNER JOIN forum_sujet 
	ON fk_sujet = id_forum_sujet
	$WHERE
	GROUP BY id_forum_sujet "
	;
	$requete_nombre_message = requete($connexion_bdd, $sql3);
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



	// affichage de la pagination
	for ($i=1; $i <= $nbrPages  ; $i++) {
			
		if(isset($_GET['categorie'])) {
			if($i == $pageCourante) {
			// le numéro de la page courante n'est pas un lien clicable
				echo "<span class=\"numerotation numerotation-active\"> $i </span>";
			}
			else {
				$categorie = $_GET['categorie'];
				echo  "<span class=\"numerotation\"><a href=\"index.php?menu=forum&categorie=$categorie&page=$i\">$i</a></span>";
			
			}	
		} 
		else {
			if($i == $pageCourante) {
			// le numéro de la page courante n'est pas un lien clicable
				echo "<span class=\"numerotation numerotation-active\"> $i </span>";
			}
			else {
				echo  "<span class=\"numerotation\"><a href=\"index.php?menu=forum&page=$i\">$i</a> </span>";
			
			}	
		}
		
			 
		
	}




?>