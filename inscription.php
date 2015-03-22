<?php 
	if(isset($_POST['bouton-inscription'])) {
		// stockage des valeurs des inputs dans des variables
	
		$pseudo = $_POST["pseudo"]; $pseudo = strip_tags($pseudo); $pseudo = htmlspecialchars($pseudo);
		$civilite = $_POST["civilite"];
		$nom = $_POST["nom"]; $nom = strip_tags($nom); $nom = htmlspecialchars($nom);
		$prenom = $_POST["prenom"]; $prenom = strip_tags($prenom); $prenom = htmlspecialchars($prenom);
		$password = $_POST["password"]; $password = strip_tags($password); $password = htmlspecialchars($password);
		$repeatPassword = $_POST["repeat-password"]; $repeatPassword = strip_tags($repeatPassword); $repeatPassword = htmlspecialchars($repeatPassword);
		$email = $_POST["email"]; $email = strip_tags($email); $email = htmlspecialchars($email);
		$repeatEmail = $_POST["repeat-email"]; $repeatEmail = strip_tags($repeatEmail); $repeatEmail = htmlspecialchars($repeatEmail);

		// verifications sur la saisie de l'utilisateur

		if($pseudo && $civilite && $nom && $prenom && $password && $repeatPassword && $email && $repeatEmail) {
			if(strlen($pseudo) >= 4 ) {
				if(strlen($prenom) >=2 && strlen($nom) >=2) {
					if($email == $repeatEmail) {
						if(strlen($password) >=4) {
							if($password == $repeatPassword) {
								// Insertion des infos sur le membre dans la BDD
								$password = md5($password);
								$sql = "INSERT INTO membres(id_membre,pseudo,civilite,nom,prenom,courriel,password) VALUES('','$pseudo','$civilite','$nom','$prenom','$email','$password')";
								$inscription_membres = cree_connexion();
								$requete_inscription_membres = requete($inscription_membres, $sql);
								echo "<p>Vous avez bien été enregistré ! <a href=\"user-connecte.php?page=connexion\">Vous pouvez vous connecter</a></p>";
							}
							else {
								echo "Les mots de passe ne sont pas identiques";
							}
						}
						else {
							echo "Mot de passe trop petit";
						}
					} 
					else {
						echo "Les email entrés ne sont pas identiques";
					}
				}
				else {
					echo "<p>Nom et prenom doivent faire 2 caractéres minimum</p>";
				}
			}
			else {
				echo "<p>Pseudo trop court</p>";
			}
		}
		else {
			echo "<p>Veuillez saisir tous les champs</p>";
		}
}
?>

<div id="form_inscription" class="block-border">
	<h2>Inscrivez-vous</h2>
	<form method="post" action="">
		<label for="pseudo">Pseudo</label><input id="pseudo" type="text" name="pseudo"/>  <br/>
		<label>Civilité </label>
		<label for="monsieur">Monsieur</label><input id="monsieur" type="radio" name="civilite" value="monsieur" checked="checked"/>
		<label for="madame">Madame</label> <input id="madame" type="radio" name="civilite" value="madame"/>
		<br/>
		<label for="nom">Nom</label><input id="nom" type="text" name="nom"/>  <br/>
		<label for="prenom">Prenom</label><input id="prenom" type="text" name="prenom"/>  <br/>
		<label for="mdp">Mot de passe</label><input id="mdp" type="password" name="password"/>  <br/>
		<label for="repeat-mdp">Repetez le mot de passe</label><input id="repeat-mdp" type="password" name="repeat-password"/>  <br/>
		<label for="email">E-mail</label><input id="email" type="email" name="email"/>  <br/>
		<label for"repeat">Repetez votre adresse E-mail</label><input id="repeat" type="email" name="repeat-email"/>  <br/>
		<input type="submit" class="bouton-bleu" name="bouton-inscription" value="Valider"/>
	</form>

<p><a href="user-connecte.php?page=connexion" >Je possede deja un compte</a></p>
	
</div>
