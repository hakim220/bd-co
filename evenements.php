<?php
// récupération des données de la table evenements
	$sql = "SELECT * FROM evenements WHERE langue = '$langue'";
    $connexion_bdd = cree_connexion();
    $requete_evenements = requete($connexion_bdd, $sql);
    $tous_evenements = retourne_tableau($requete_evenements);
    
   //var_dump($tous_evenements);
	
	foreach($tous_evenements as $evenements){
	?>
		<div id="un_evenement" class="border2">
			<span><?php echo $evenements['date']; ?></span>
			<h2><?php echo $evenements['titre']; ?></h2>
			<span style="<?php if($evenements['echeance']=="a venir") {echo "color:#009ece;"; } else { echo"color:#D12323;";} ?>"><?php echo $evenements['echeance']; ?></span>
			<?php echo "<a href='index.php?event={$evenements['id_evenement']}&langue={$langue}' class='border' >Plus d'informations</a>"; ?>				
		</div>
	<?php
	}

?>