<?php
// Initialisations des sessions
include "session.php";

// Chargement des fonctions utiles
include "initialisations.php";

include "langue.php";

include "ousuisje.php";

include "connexion.php";
?>
<!doctype html>
<html lang="fr">
<head>
	  <meta charset="utf-8">
	  <title>Bd-co.com</title>
	  <link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/tunnel.css">
	
</head>
	
<body>
	<?php include("header_tunnel.php"); ?>
	<div class="wrapper">
	<div class="etape">
		<ul>
			<li class="etape_en_cours">1) Identification</li>
			<li class="autre_etape">2) Information et livraison</li>
			<li class="autre_etape">3) Paiement</li>
		</ul>
	</div> <!-- fin etape -->
<?php

if(!empty($_SESSION['panier']) && $_SESSION['total'] > 0) {
	// si on a un panier reel, on entre dans le tunnel de vente...
	
?>	
	<div class="clear"></div>
	<div class="deja_membre">
		<h2>Je suis deja membre</h2>
		<form method="post" action="">
			<label for="email">E-mail</label><input id="email" type="email" name="email"/><br/>
			<label for="password">Mot de passe</label><input id="password" type="text" name="password"/><br/>
			<p class="text_center"><a href="#"><span class="underline">Mot de passe oublié</span></a></p> <br/>
			<input type="submit" name="bouton-tunnel" class="bouton-bleu"/>
		</form>
	</div>
	
<?php
	// si l'utilisateur valide le formulaire de connexion
	if(isset($_POST["bouton-tunnel"])) {
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
				// on peut passer à la 2eme etape du tunnel de vente
				header('Location: tunnel-2-a.php');
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
	?>
	<div class="pas_membre">
		<h2>Je ne suis pas encore membre</h2>
		<form method="post" action="">
			<label for="email2">E-mail</label><input id="email2" type="email" name="email_new_user"/><br/>
			<label for="password2">Mot de passe</label><input id="password2" type="text" name="password"/><br/>
			<label for="repeat_password">Repetez votre mot de passe</label><input id="repeat_password" type="text" name="repeat-password"/><br/>
			<p class="text_center"><input type="checkbox" name="condition_utilisation"/><a href="#">J'ai lu et accepeté <span class="underline">les contitions d'utilisation</span></a></p> <br/>
			<input type="submit" name="bouton-tunnel-new-user" class="bouton-bleu"/>
		</form>
	</div>	
	
	<?php
	
	if(isset($_POST['bouton-tunnel-new-user'])) {
		// récupération des données entrées dans le formulaire
		$email = $_POST['email_new_user']; $email = strip_tags($email); $email= htmlspecialchars($email);
		$password =  $_POST['password']; $password = strip_tags($password); $password = htmlspecialchars($password);
		$repeat_password = $_POST['repeat-password'];  $repeat_password = strip_tags($repeat_password); $repeat_password = htmlspecialchars($repeat_password);
		
		// si le password est OK, on creer le nouveau membre avec les informations de base
		if($password == $repeat_password) {
				
			$connexion_bdd = cree_connexion();
			$sql2 = "INSERT INTO membres(id_membre,courriel,password) VALUES('','$email','$password')";
		       
		    $requete_produits_ajoutes = requete($connexion_bdd, $sql2);
			$_SESSION['login']=true;
			$_SESSION['email'] = $email;
			// on peut passer à la 2eme etape du tunnel de vente
			header('Location: tunnel-2-b.php');
		}
		else {
			echo "les mot de passe ne sont pas identiques";
		}	
	}
}
else {
	//sinon, on redirige l'utilisateur vers la home page		
	header("location: index.php");
}
	include "footer.php";
?>
	