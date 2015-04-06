<?php
/*

// récupération des données de la table evenements
	$sql = "SELECT * FROM evenements WHERE langue = '$langue'";
    $connexion_bdd = cree_connexion();
    $requete_evenements = requete($connexion_bdd, $sql);
    $tous_evenements = retourne_tableau($requete_evenements);
    
   //var_dump($tous_evenements);
	
	foreach($tous_evenements as $evenements){
	?>
		<div class="un_evenement block-border">
			<span><?php echo $evenements['date']; ?></span>
			<h2><?php echo $evenements['titre']; ?></h2>
			<span style="<?php if($evenements['echeance']=="a venir") {echo "color:#009ece;"; } else { echo"color:#D12323;";} ?>"><?php echo $evenements['echeance']; ?></span>
			<?php echo "<a href='index.php?event={$evenements['id_evenement']}&amp;langue={$langue}' class='border bouton-rouge' >Plus d'informations</a>"; ?>				
		</div>
	<?php
	}
*/

require('mes_class.php');

$date = new Date();
$year = date('Y');
$dates = $date->getAll($year);


?>

<div class="periods">
	<div class="year"><?php echo $year; ?></div>
	<div class="months">
		<ul>
			<?php foreach($date->months as $id => $m): ?>			
			<li><a href="#" id="linkMonth<?php echo $id+1; ?>"><?php echo substr($m,0,3); ?></a></li>
			<?php endforeach; ?>
		</ul>	
	</div>
	<?php $dates = current($dates); ?>
	<?php foreach($dates as $m=>$days): ?>
	<div class="month" id="month<?php echo $m; ?>">
		<table>
			<thead>
				<tr>
					<?php foreach ($date->days as $d): ?>
						<th><?php echo substr($d,0,3); ?></th>
					<?php endforeach; ?>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php $end = end($days); foreach($days as $d=> $w): ?>
					<?php if($d == 1) :?>
						<td colspan="<?php echo $w-1 ?>" class="padding"></td>
						<?php endif; ?>	
						<td>
							<div class="relative">
								<div class="day"> <?php echo $d; ?></div>
								
							</div>
							
							
							
							
						</td>
						<?php if($w == 7): ?>
							<tr/><tr>
						<?php endif; ?>
					<?php endforeach; ?>
					<?php if($end != 7): ?>
						<td colspan="<?php echo 7-$end;?> class="padding"></td>
					<?php endif; ?>
					
				</tr>
			</tbody>
		</table>
	</div>
	<?php endforeach; ?>
	
	
	
	
</div>
<?php
echo "<pre>";
print_r($dates);
echo "</pre>";
?>
