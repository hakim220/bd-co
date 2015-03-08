<?php

	// Crée la connexion et renvoie un lien vers celle-ci	
	// $mdp = root sur mac et ""sur pc
	

	
	function cree_connexion($base = "bd-co", $serveur = "localhost", $user = "root", $mdp = "")
	{
	
		// Tentative de connexion au serveur
		$connexion = mysqli_connect($serveur, $user, $mdp);
		if($connexion === false) // Gestion de l'erreur de connexion
		{
			echo "<div id='information'><p>La connexion sur $serveur n'a pu s'établir pour l'utilisateur $user</p></div>";
			exit(1);
		}
		
		// Tentative de sélection de la base qui nous intéresse
		$base_en_cours = mysqli_select_db($connexion, $base);
		if($base_en_cours === false) // Gestion du select de la base
		{
			echo "<div id='information'><p>La sélection de la base $this->base est impossible</p></div>";
			exit(2);
		}

		requete($connexion, "SET NAMES 'UTF8';");

		return $connexion;
	}

	// Exécute la requête contenue dans $sql
	function requete($connexion, $sql)
	{
		// Exécution de la requête
		$requete_en_cours = mysqli_query($connexion, $sql);
		
		// Traîtement d'erreur
		if($requete_en_cours === false) { // Erreur lors de la requête
				echo "<div id='information'><p>La requête $sql a échouée</p></div>";
				return false;
		}
		return $requete_en_cours;
	}

	// Renvoie un tuple	de la requête en cours
	function retourne_ligne($requete_en_cours)
	{
		
		if($requete_en_cours === false) { // Pas de requête en cours
			echo "<div id='information'><p>Il n'y a pas de requête en cours !</p></div>";
			$ligne_en_cours = false;
		} else { // ligne_en_cours contient le tableau retourné par mysqli_fetch_assoc
			$ligne_en_cours = mysqli_fetch_assoc($requete_en_cours);
		}
		return $ligne_en_cours;
	}

	// Renvoie l'ensemble des tuples de la requête
	function retourne_tableau($requete_en_cours)
	{
		
		$tableau_ligne = array();
		while($nouvelle_ligne=retourne_ligne($requete_en_cours)) {
			$tableau_ligne[] = $nouvelle_ligne;
		}
		return $tableau_ligne;
	}
	

?>
