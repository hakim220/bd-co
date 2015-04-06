


<?php 
// récupération de toutes les données pour l'affichage de la fiche produit
	$sql = "SELECT * FROM designation_article INNER JOIN article on fk_article = id_article WHERE id_designation_article = '$_GET[fiche_produit]'; ";
   
   	$sql2 = "SELECT * FROM designation_article INNER JOIN liste_auteur_bd on id_designation_article = fk_designation_article INNER JOIN auteur_bd on fk_auteur_bd = id_auteur_bd WHERE id_designation_article = '$_GET[fiche_produit]';"; ;
   
   	$sql3 = "SELECT * FROM designation_article INNER JOIN series_bd ON fk_serie_bd = id_series_bd WHERE id_designation_article = '$_GET[fiche_produit]'; ";
   
    $sql4 = "SELECT * FROM designation_article INNER JOIN genre_bd ON id_genre_bd = fk_genre_bd WHERE id_designation_article = '$_GET[fiche_produit]';";
   
   
    $connexion_bdd = cree_connexion();
	
	
    $requete_prix_stock_infos = requete($connexion_bdd, $sql);
    $prix_stock_infos = retourne_ligne($requete_prix_stock_infos);
	
	//var_dump($prix_stock_infos);

	
	
    $requete_auteur = requete($connexion_bdd, $sql2);
    $auteurs = retourne_tableau($requete_auteur);
	//var_dump($auteurs);
	
	
    $requete_serie = requete($connexion_bdd, $sql3);
    $serie = retourne_ligne($requete_serie);
	//var_dump($serie);
	
	
	
    $requete_genre = requete($connexion_bdd, $sql4);
    $genre = retourne_ligne($requete_genre);
	//var_dump($genre);


	//echo "<img src=\"$produit[lien_photo]\"";
	
?>
<div id="content_fiche_produit">
	<div class="photos">
		<img src="<?php echo  $prix_stock_infos['lien_photo']; ?>" alt="" width="250px" height="300px"/>
	</div>
	<div class="informations_bd">
		<div>
			<h1><?php echo $prix_stock_infos['designation']; ?></h1>
			<ul>
				<li><span class="gras">Nom de la série : </span><?php echo $serie['nom_serie']; ?></li>
				<li><span class="gras">Genre : </span><?php echo $genre['genre_bd']; ?></li>
				<li><span class="gras">Sortie le : </span><?php echo $prix_stock_infos['date_parution']; ?></li>
				<li><span class="gras">Nombre de page : </span><?php echo $prix_stock_infos['nombre_page']; ?></li>
				<li><span class="gras">Numéro ENA :</span><?php echo $prix_stock_infos['ena']; ?></li>
				<?php 
					echo "<p><span class=\"gras\"> Auteur(s) :</span> ";
					
					foreach ($auteurs as $auteur) {
						echo "<span>$auteur[nom_auteur]</span>";
						// si on a au moins 2 auteurs, il faut mettre une virgule pour séparer
						// if(count($auteurs) >=1) {echo ", ";} else {}
					}
					echo "</p>";
				?>
			</ul>
		</div>
		<div>
			<!-- systeme de quantite à gerer ici -->
			
			<p><span class="gras">Prix : </span><?php echo $prix_stock_infos['prix_unitaire']; ?> €</p>
			<p><span class="gras">En stock,</span> expédié en 48h (livraison gratuite)</p>
			<a class="bouton-bleu" href="add_panier.php?id_product=<?php echo $prix_stock_infos['fk_article']; ?>">Ajoutez au pannier</a>	
		</div>
	</div> <!--- fin informations BD -->
	
	
	
	<div class="resume_bd">
		<h2>Résumé :</h2>
		<p><?php echo $prix_stock_infos['resume']; ?></p>
	</div>	
	<div class="bd_complementaire">
		<h2>Bd qui pourraient vous intéresser :</h2>
	<?php	// affichage des BD complementaires
	
	$genre_bd_en_cours =$genre['fk_genre_bd'];
	$id_bd_en_cours = $prix_stock_infos['id_designation_article'];
	
	$sql5 = "SELECT * FROM designation_article WHERE fk_genre_bd = $genre_bd_en_cours AND id_designation_article != $id_bd_en_cours";
	$requete_bd_complementaire = requete($connexion_bdd, $sql5);
    $bd_complementaire = retourne_tableau($requete_bd_complementaire);
	//var_dump($auteurs);
	
	
	$lien = $bd_complementaire[0]['fk_article'];
	//echo $lien;
	
	$i = 0;
	foreach($bd_complementaire as $bd) {
		echo "<div class=\"produit_complementaire\">";
		echo "<img src=\"$bd[lien_photo]\" alt=\"xx\" width=\"150px\"  height=\"200px\" /><br/>" ;
	?>
		<a class="bouton-bleu" href="index.php?fiche_produit=<?php echo $bd_complementaire[$i]['fk_article'] ;?>">Voir le produit</a>
		
	<?php
		echo "</div>";
	$i++;
	}
	
	?>
	
	</div> <!-- fin bd complementaire -->
</div>  <!-- fin content fiche produit -->


