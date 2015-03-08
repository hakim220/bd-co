<?php

	require_once "BDD.php";

	function EstClePrimaire($nom_champ)
	{
		$pos = strpos($nom_champ, "id_");
		return ($pos==0) && ($pos !==false);

	}	


?>