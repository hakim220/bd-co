<div id="header-content">
				<div id="logo">
					<a href="index.php"><img src="img-maquette/logo.png"  alt="logo bd & co"/></a>
				</div>
				<nav role="navigation">
					<ul>
					<?php
	
	// récupération des données pour le menu principal
	$sql = "SELECT * FROM menu WHERE type = 'principal' ORDER BY index_affichage"; // à voir une modification de la requete pour la langue
    $connexion_bdd = cree_connexion();
    $requete_menu_principal = requete($connexion_bdd, $sql);
    $menu_principal = retourne_tableau($requete_menu_principal);		
		foreach($menu_principal as $lien){

		echo "<li><a href=\"index.php?menu=".$lien['lien']."\">". $lien['designation']."</a>";
			 
		if($lien['lien']=='actualites') {
			// récupération des données pour le sous-menu de actualites
			
			$sql = "SELECT * FROM menu WHERE type = 'sous-menu' ORDER BY index_affichage"; // à voir une modification de la requete pour la langue
    		$connexion_bdd = cree_connexion();
   			$requete_sous_menu = requete($connexion_bdd, $sql);
    		$sous_menu = retourne_tableau($requete_sous_menu);	
			
			echo "<ul id=\"sous-menu\">";
			foreach($sous_menu as $lien_sous_menu) {
				echo"<li><a href=\"index.php?menu=".$lien_sous_menu['lien']."\">". $lien_sous_menu['designation']."</a></li>";	
			}
			echo "</ul>";
		}
		
	
				
		echo "</li>";
	
		
		
		}			
	?>
				<!--	
					<ul>
						<li><a href="index.php?menu=actualites">Actualités</a>
							<ul id="sous_menu">
								<li><a href="index.php?menu=actualites_news">News</a></li>
								<li><a href="index.php?menu=actualites_chroniques">Chroniques</a></li>
								<li><a href="index.php?menu=actualites_interviews">Interview</a></li>
							</ul>
						</li>
						<li><a href="#">Boutique</a></li>
						<li><a href="index.php?menu=evenements">Evenements</a></li>
						<li><a href="#">Forum</a></li>
					</ul>
			-->		
			</ul>
				</nav>
				<div id="block_droite">
					<form method="post" name="search">
						<input type="search" name="barre_recherche" placeholder="Entrez le nom d'une BD"/>
						<input type="submit" name="valider_recherche" class=""  value=""/>
					</form>
					<ul>
						<li class="bouton-bleu"><a href="#">FR</a></li>
						<li class="bouton-bleu"><a href="#">EN</a></li>
					</ul>
					<ul>
					
						<?php  if($_SESSION['login'] == true) { ?>
						
						
						<li class="bouton-bleu"><a href="membre.php">Mon espace</a></li>
						<li class="bouton-bleu"><a href="index.php?menu=deconnexion">Deconnexion</a></li>
						
						<?php } else {?>
					
						<li class="bouton-bleu"><a href="user-connecte.php?page=connexion">Connexion</a></li>
						<li class="bouton-bleu"><a href="index.php?menu=inscription">Inscription</a></li>
						<?php } ?>
					</ul>
					<!-- il faudra ajouter le ul-li "mon compte/deconnexion" quand l'utilisateur est connecté... -->
					
					<a class="bouton-bleu">Panier</a>
				</div>
			</div> <!--fin header content-->