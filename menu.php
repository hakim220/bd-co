<div id="header-content">
				<div id="logo">
					<a href="index.php"><img src="img-maquette/logo.png"  alt="logo bd & co"/></a>
				</div>
				<nav role="navigation">
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
				</nav>
				<div id="block_droite">
					<form method="post" name="search">
						<input type="search" name="barre_recherche" placeholder="Entrez le nom d'une BD"/>
						<input type="submit" name="valider_recherche" class=""  value=""/>
					</form>
					<ul>
						<li class="border"><a href="#">FR</a></li>
						<li class="border"><a href="#">EN</a></li>
					</ul>
					<ul>
					
						<?php  //if($connecte == true) { ?>
						
						<!--
						<li class="border"><a href="index.php?menu=connexion">Mon espace</a></li>
						<li class="border"><a href="index.php?menu=inscription">Deconnexion</a></li>
						-->
						<?php //} else {?>
					
						<li class="border"><a href="index.php?menu=connexion">Connexion</a></li>
						<li class="border"><a href="index.php?menu=inscription">Inscription</a></li>
						<?php// } ?>
					</ul>
					<!-- il faudra ajouter le ul-li "mon compte/deconnexion" quand l'utilisateur est connecté... -->
					
					<a class="border">Panier</a>
				</div>
			</div> <!--fin header content-->