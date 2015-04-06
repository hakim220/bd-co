<?php 


$connexion_bdd = cree_connexion();
/* systeme de pagination */

// on récupére le nombre total de sujet
$sql4 = "SELECT COUNT(id_actualite_seule) as nbrSujet FROM actualite_seule"; // il faudra ajouter la langue quand ça aura été actualisé dans la BDD
$requete_nombre_sujet = requete($connexion_bdd, $sql4);
$nombre_sujet = retourne_ligne($requete_nombre_sujet);


//var_dump($nombre_sujet);
$nbrSujet = $nombre_sujet['nbrSujet'];
//echo $nbrSujet;

// on veut 4 sujet par page
$parPage = 4;
//on arrondi au nombre supérieur pour éviter les nombres à virgule
$nbrPages = ceil($nbrSujet/$parPage);
if(isset($_GET['categorie'])) {
	$sql5 = "SELECT COUNT(id_actualite_seule) as nbrSujet FROM actualite_seule WHERE categorie_actualite = '$_GET[categorie]'";
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

// fin pagination    ==> il faudra ajouter des where pour la langue !!!








// on teste si le parametre de la catégorie est présent pour filtrer les articles. Si il n'existe pas, on aura tous les articles
	
	if(isset($_GET['categorie'])) {
			
		// ajout d'une condition au cas ou l'utilisateur modifie les parametre dans l'url
		if($_GET['categorie'] == 'news' || $_GET['categorie'] == 'chronique' || $_GET['categorie'] == 'interview') {
			$sql = "SELECT * FROM actualite_seule
			INNER JOIN redacteur_actualite ON
			fk_redacteur_article = id_redacteur_actualite
			WHERE categorie_actualite = '$_GET[categorie]'
			ORDER BY date_publication DESC 
			LIMIT ".(($pageCourante-1)*$parPage).", $parPage";; // à voir une modification de la requete pour la langue
		    $connexion_bdd = cree_connexion();
		    $requete_actualites= requete($connexion_bdd, $sql);
		    $actualites= retourne_tableau($requete_actualites);
		}
		else {
			$sql = "SELECT * FROM actualite_seule
			INNER JOIN redacteur_actualite ON
			fk_redacteur_article = id_redacteur_actualite
			ORDER BY date_publication DESC 
			LIMIT ".(($pageCourante-1)*$parPage).", $parPage";; // à voir une modification de la requete pour la langue
		    $connexion_bdd = cree_connexion();
		    $requete_actualites = requete($connexion_bdd, $sql);
		    $actualites = retourne_tableau($requete_actualites);
		}
		
	}
	else {
		$sql = "SELECT * FROM actualite_seule
	INNER JOIN redacteur_actualite ON
	fk_redacteur_article = id_redacteur_actualite
	ORDER BY date_publication DESC 
	LIMIT ".(($pageCourante-1)*$parPage).", $parPage"; // à voir une modification de la requete pour la langue
    $connexion_bdd = cree_connexion();
    $requete_actualites = requete($connexion_bdd, $sql);
    $actualites = retourne_tableau($requete_actualites);
		
	}
	
	
	//var_dump($toutes_actualites);
  //var_dump($tous_evenements);
   
   
   
   
   
   
   
   
   
   foreach($actualites as $actualite){
	?>
		<div class="une_actualite">
			<div class="photo_miniature">
				<img src="<?php echo $actualite['photo_miniature'] ;?>" alt="" width="150px" height="150px"/>  <!-- width et height à retirer-->
			</div>
			<div class="content_actualite">
				<h2><?php echo $actualite['titre'] ;?></h2>
				<span> <?php echo "<a href='index.php?redacteur={$actualite['id_redacteur_actualite']}&amp;langue={$langue}'>" ?><?php echo 'par '. $actualite['nom'] .' '. $actualite['prenom'] ; ?></a></span>
				<span>le <?php echo $actualite['date_publication'] ;  ?></span>
				<span class="couleur-rouge"><?php echo $actualite['categorie_actualite'] ;  ?></span>
				<p><?php echo substr($actualite['texte'],0,200).'...' ;  ?></p>
				<?php echo "<a class=\"lire_suite bouton-rouge\"  href='index.php?actualite={$actualite['id_actualite_seule']}&amp;langue={$langue}' >Lire la suite</a>"; ?>
			</div>
		</div>
		
	<?php
	}
   
   
   // affichage de la pagination
	for ($i=1; $i <= $nbrPages  ; $i++) {
			
		if(isset($_GET['categorie'])) {
			if($i == $pageCourante) {
			// le numéro de la page courante n'est pas un lien clicable
				echo "<span class=\"numerotation numerotation-active\">$i</span>";
			}
			else {
				$categorie = $_GET['categorie'];
				echo  "<span class=\"numerotation\"><a href=\"index.php?menu=actualites&categorie=$categorie&page=$i\">$i</a></span>";
			
			}	
		} 
		else {
			if($i == $pageCourante) {
			// le numéro de la page courante n'est pas un lien clicable
				echo "<span class=\"numerotation numerotation-active\">$i</span>";
			}
			else {
				echo  "<span class=\"numerotation\"><a href=\"index.php?menu=actualites&page=$i\">$i</a></span>";
			
			}	
		}
		
			 
		
	}

 ?>