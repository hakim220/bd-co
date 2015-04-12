<?php 

// récupération des données sur le slider
	
	$sql = "SELECT * FROM slider WHERE langue= '$langue' ";
    $connexion_bdd = cree_connexion();
    $requete_slider = requete($connexion_bdd, $sql);
    $content_slider = retourne_tableau($requete_slider);

	?>
		
		<section id="content_home_page">
			<div id="slider">
				<ul class="bxslider">
					<?php 
						foreach ($content_slider as $slide) {
							
					?>
					
				  <li style="position: relative;"><a href="<?php echo $slide['lien_page']; ?>" target="_blank"><img src="<?php echo $slide['image']; ?>" alt="<?php echo $slide['attribut_alt_img']; ?>" /></a>
				  	<div class="bandeau-slider">
    
				  		<h3 class="couleur-blanche" style="font-family: allerregular; font-size: 18px; margin-bottom: 2px; font-weight: bold; opacity: 1;"><?php echo $slide['titre_slider']; ?></h3>
				  		<p class="couleur-blanche" style="font-family: quattrocento_sansregular; font-size: 13px; font-weight: bold; opacity: 1;"><?php echo $slide['texte_complementaire']; ?></p>
				  	</div>
				  </li>
				  <?php }?>
				</ul>
				
				  
			</div>
			
			<?php 
			// récupération des données sur les dernières actu
			$sql2 = "SELECT * FROM actualite_seule INNER JOIN redacteur_actualite ON fk_redacteur_article = id_redacteur_actualite WHERE langue= '$langue' ORDER BY date_publication DESC LIMIT 0,2 ";
		    $requete_derniere_actu = requete($connexion_bdd, $sql2);
		    $dernieres_actu = retourne_tableau($requete_derniere_actu);
			
			//var_dump($dernieres_actu);
			?>
			
			
			
			
			<div id="derniere_actu">
				<h2>Les dernières actualités</h2>
				<div class="trait-droit "></div>
				<?php 
				
				foreach ($dernieres_actu as $actu) {
				
				?>
				
				
				<article>
					<img src="<?php echo $actu['photo_miniature']; ?>" alt="xx"/>
					<div>
						<h1><?php echo $actu['titre']; ?></h1>
						<?php
						// gestion de l'affichage de la date au format FR
						$timestamp = strtotime($actu['date_publication']); 
						$dateFr = date("d/m/Y",$timestamp) ;
						?>
						<p>Par <?php echo $actu['nom'] . " ".$actu['prenom'] ; ?>, le <?php echo $dateFr; ?> <strong class="couleur-rouge"><?php echo $actu['categorie_actualite']; ?> </strong></p>    <!--A voir si on mets la date dans une balise html date...?? -->
						
						<p><?php echo substr($actu['texte'],0,80).'...'; ?></p>
						<a  href="index.php?actualite=<?php echo $actu['id_actualite_seule']."&langue=$langue"; ?>" class="lire_suite bouton-bleu couleur-blanche">Lire la suite</a>
					</div>
				</article>
				<?php	
					
				}
				
				?>
				
				
				
			</div> <!-- fin dernière actu -->
			
			<div id="conteneur-event-news">
				
				<?php 
					// récupération des données sur les dernièrs evenements
					$sql3 = "SELECT * FROM evenements WHERE langue= '$langue' ORDER BY date DESC LIMIT 0,2 ";
				    $requete_evenements = requete($connexion_bdd, $sql3);
				    $evenements = retourne_tableau($requete_evenements);
					
					//var_dump($evenements);
				?>
				
				
				
				<div id="evenement">				
						<h2>Prochains evenements</h2>
						<div class="trait-droit "></div>
					
					
					<?php 
						foreach ($evenements as $evenement) {	
					?>
					<div class="un_event">
						<?php
						// gestion de l'affichage de la date au format FR
						$timestamp = strtotime($evenement['date']); 
						$dateFr = date("d/m/Y",$timestamp) ;
						$date_evenement = explode('/',$dateFr);
						
						if($langue == "en")
						switch ($date_evenement[1]) {
							case 01: $date_evenement[1] = "January"; break;
							case 02: $date_evenement[1] = "Februry"; break;
							case 03: $date_evenement[1] = "March"; break;
							case 04: $date_evenement[1] = "April"; break;
							case 05: $date_evenement[1] = "May"; break;
							case 06: $date_evenement[1] = "Juin"; break;
							case 07: $date_evenement[1] = "Juilly"; break;
							case 08: $date_evenement[1] = "Aougust"; break;
							case 09: $date_evenement[1] = "September"; break;
							case 10: $date_evenement[1] = "October"; break;
							case 11: $date_evenement[1] = "November"; break;
							case 12: $date_evenement[1] = "December"; break;	
						}
						else {
							switch ($date_evenement[1]) {
							case 01: $date_evenement[1] = "Janvier"; break;
							case 02: $date_evenement[1] = "Fevrier"; break;
							case 03: $date_evenement[1] = "Mars"; break;
							case 04: $date_evenement[1] = "Avril"; break;
							case 05: $date_evenement[1] = "Mai"; break;
							case 06: $date_evenement[1] = "Juin"; break;
							case 07: $date_evenement[1] = "Juillet"; break;
							case 08: $date_evenement[1] = "Aout"; break;
							case 09: $date_evenement[1] = "Septembre"; break;
							case 10: $date_evenement[1] = "Octobre"; break;
							case 11: $date_evenement[1] = "Novembre"; break;
							case 12: $date_evenement[1] = "Decembre"; break;
							}
						}
						
						?>
						
						<p><span class="jour_event couleur-blanche"><?php echo $date_evenement[0]; ?></span> <?php echo $date_evenement[1] . " ".$date_evenement[2] ; ?></p>  <!-- à voir si on mets pas la balise date html -->
						<h3><?php echo $evenement['title']; ?></h3>
					</div>
					<?php
						}
					
					?>
					
					
				</div> <!-- fin evenements -->
				
				<div id="newsletter" class="border2 block-border">
					<h2>Inscrivez-vous à la newsletter</h2>
					<form name="newsletter" method="post">
						<input type="text" name="prenom" placeholder="Nom" />
						<input type="text" name="nom" placeholder="Prenom" />
						<input type="email" name="email" placeholder="E-mail" />
						<input type="submit" name="envoyer" class="bouton-bleu" value="Inscription" />
					</form>
				</div> <!-- fin newsletter -->
			</div>
			<div id="selection_bd" >
				<div class="trait-gauche "></div>
				<h2>Selection de bande dessinée</h2>
				<div class="trait-droit "></div>
				<div id="conteneur" class="block-border border2">
					<div>
						<img src="img-maquette/bd1.jpg" alt="xx"/>
						<h3>Thorgal n8</h3>
						<p>8,50euros</p>
						<a class="bouton-bleu" href="#">Voir le produit</a>
					</div>
					<div>
						<img src="img-maquette/bd2.jpg" alt="xx"/>
						<h3>Thorgal n8</h3>
						<p>8,50euros</p>
						<a class="bouton-bleu" href="#">Voir le produit</a>
					</div>
					<div>
						<img src="img-maquette/bd3.jpg" alt="xx"/>
						<h3>Thorgal n8</h3>
						<p>8,50euros</p>
						<a class="bouton-bleu" href="#">Voir le produit</a>
					</div>
				</div>
			</div>
			
		</section> <!-- fin content_home_page -->
	  
	  
		