<?php

// si l'utilisateur valide le formulaire de connexion
if(isset($_POST["bouton-connexion"])) {
	//sécurisation des valeurs
	$email = $_POST["email"]; $email = strip_tags($email); $email = htmlspecialchars($email);
	$password = $_POST["password"]; $password = strip_tags($password); $password = htmlspecialchars($password);
		
	if($email && $password) {
		 $connexion_bdd = cree_connexion();
		 // on remmet le mot de passe en MD5 pour la comparaison avec ce qu'il y a dans la BDD
		 $password = md5($password);
		
		 $sql = "SELECT * FROM membres WHERE courriel='$email' AND password='$password'";
		 $requete_evenements = requete($connexion_bdd, $sql);
		// On vérifie si l'email correspond au bon mot de passe
		 $rows = mysqli_num_rows($requete_evenements);
		 if($rows == 1) {
			// on récupere l'email, pour l'espace membre et on enregistre la session avant la redirection	
			$_SESSION['email'] = $email;
			$_SESSION['login']=true;
			header('Location: membre.php');
			exit;
		 }
		 else {
		 	// si il n'y a pas de correspondance email/mdp dans la BDD, on affiche un message
		 	$_SESSION['mdp_incorrect'] = "E-mail ou mot de passe incorrect";
			echo $_SESSION['mdp_incorrect'];	
		 }
	}
	else {
		// si l'utilisateur n'a pas tout rempli, on affiche un message
		$_SESSION['champs_oublies'] = "il faut remplir tous les champs";
		
		echo $_SESSION['champs_oublies'];
		//header('Location: user-connecte.php?page=connexion');
		//echo "il faut remplir tous les champs";
	}
}
else {
		// on ne fait rien si l'utilisateur n'est pas passé par le formulaire de connexion...
}

// sessionde login est à false par défaut car l'utilisateur n'est pas passé par le formulaire
if(isset($_SESSION['login'])==false) {
	$_SESSION['login'] = false;
}
	
// si on se trouve sur la page qui contient le formulaire de connexion, on aura le formulaire de connexion
if (isset($_GET['page']) && $_GET['page']=='connexion' ) {  
	
?>


<div id="form_connexion" class="block-border">
	<h2>Connectez-vous</h2>
	<form method="post" action="">
		<label for="email">Email</label><input id="email" type="email" name="email"/>  <br/>
		<label for="mdp"> Mot de passe</label><input id="mdp" type="password" name="password"/> <br/>
		<input type="submit" class="bouton-bleu" value="valider" name="bouton-connexion"/>
	</form>
	
	<p><a href="index.php?menu=inscription">Pas encore membre </a></p>
</div>
<?php 
}else {
	// si on est sur toutes les autres pages, on affiche rien...
}

?>
