<?php

if(isset($_POST["bouton-connexion"])) {
	$email = $_POST["email"]; $email = strip_tags($email); $email = htmlspecialchars($email);
	$password = $_POST["password"]; $password = strip_tags($password); $password = htmlspecialchars($password);
		
	if($email && $password) {
	
		$base = mysql_connect ('localhost', 'root', '');
		mysql_select_db ('bd-co');

		// on teste si une entrée de la base contient ce couple login / pass
		
		
		$sql = 'SELECT count(*) FROM membres WHERE courriel="'.mysql_escape_string($email).'" AND password="'.mysql_escape_string($password).'"';
		$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$data = mysql_fetch_array($req);

		mysql_free_result($req);
		mysql_close();
		
		
			// si on obtient une réponse, alors l'utilisateur est un membre
		if ($data[0] == 1) {
			session_start();
			$_SESSION['email'] = $_POST['email'];
			header('Location: membre.php');
			exit();
		}
		// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
		elseif ($data[0] == 0) {
			$erreur = 'Compte non reconnu.';
			echo $erreur;
		}
		// sinon, alors la, il y a un gros problème :)
		else {
			$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
			echo $erreur;
		}
	}
	else {
		echo "il faut remplir tous les champs";
	}
	
		
}
	



?>



<form method="post" action="">

Email<input type="email" name="email"/>  <br/>
Mot de passe<input type="password" name="password"/> <br/>
<input type="submit" name="bouton-connexion"/>


</form>



<p><a href="index.php?menu=inscription">Pas encore membre </a></p>