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
			
			
			<div id="derniere_actu">
				<h2>Les dernières actualités</h2>
				<div class="trait-droit "></div>
				<article>
					<img src="img-maquette/bd-amateur.jpg" alt="xx"/>
					<div>
						<h1>La BD amateur à l'honneur à Paris</h1>
						<p>Par Jhon Smith, le 12/02/2015 <strong class="couleur-rouge">News</strong></p>    <!--A voir si on mets la date dans une balise html date...?? -->
						<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en...</p>
						<a  href="#" class="lire_suite bouton-bleu couleur-blanche">Lire la suite</a>
					</div>
				</article>
				<article>
					<img src="img-maquette/pop-art.jpg" alt="xx"/>
					<div>
						<h1>La BD amateur à l'honneur à Paris</h1>
						<p>Par Jhon Smith, le 12/02/2015 <strong class="couleur-rouge">News</strong></p>    <!--A voir si on mets la date dans une balise html date...?? -->
						<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en...</p>
						<a  href="#" class="lire_suite bouton-bleu couleur-blanche">Lire la suite</a>
					</div>
				</article>
			</div> <!-- fin dernière actu -->
			
			<div id="conteneur-event-news">
			<div id="evenement">				
					<h2>Prochains evenements</h2>
					<div class="trait-droit "></div>
				<div class="un_event">
					<p><span class="jour_event couleur-blanche">12</span> Janvier 2015</p>  <!-- à voir si on mets pas la balise date html -->
					<h3>Lancement d’un nouvelle collection de BD !</h3>
				</div>
				<div class="un_event">
					<p><span class="jour_event couleur-blanche">12</span> Janvier 2015</p>  <!-- à voir si on mets pas la balise date html -->
					<h3>Lancement d’un nouvelle collection de BD !</h3>
				</div>
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
	  
	  
		