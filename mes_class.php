<?php 
// Class pour la gestion du calendrier

class Date  {
		
	var $days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
	var $months = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre');	
		
	function getAll($year){
		$r= array();
		$date = strtotime($year.'-01-11');
		
		while(date('Y',$date) <= $year){
			$y = date('Y',$date);
			$m = date('n',$date);
			$d = date('j',$date);
			// on remplace le 0 par un 7 pour gerer le dimanche
			$w = str_replace('0','7',date('w',$date));
			$r[$y][$m][$d] = $w;
			$date = strtotime(date('Y-m-d',$date).' + 1 DAY'); 
		}
		return $r;
	}
	
}


class panier {
	public function __construct(){
		
		// on creer un panier vide en cas de probleme
		if(!isset($_SESSION['panier'])) {
			$_SESSION['panier'] = array();
		}
		// si on appuie sur le bouton recalculer, on va lancer la méthode recalculer
		if(isset($_POST['panier']['quantite'])) {
			$this->recalc();
		}
	
	
	}
	
	//methode pour recalculer un panier si l'utilisateur ajoute/enleve des quantités ou si il tente de magouiller dans la console...
	public function recalc(){
		foreach ($_SESSION['panier'] as $product_id => $quantity)  {
			if(isset($_POST['panier']['quantite'][$product_id])) {
				$_SESSION['panier'] = $_POST['panier']['quantite']; 
			}
		}		
	}
	
	// methode pour calculer le montant total du pannier
	public function count_panier(){
		return array_sum($_SESSION['panier']);
	}
	
	
	
	public function total(){
		$total = 0;
		
		$ids = array_keys($_SESSION['panier']);
		
		// si le pannier est vide, on creer un array pour eviter l'erreur
		if(empty($ids)) {
			$produits_ajoutes =array();
		}
		else {
			$connexion_bdd = cree_connexion();
			$sql = 'SELECT fk_article, prix_unitaire FROM designation_article 
			INNER JOIN article ON fk_article = id_article 
			WHERE fk_article IN ('.implode(',',$ids).')';
		       
		    $requete_produits_ajoutes = requete($connexion_bdd, $sql);
		    $produits_ajoutes= retourne_tableau($requete_produits_ajoutes);
			//var_dump($produits_ajoutes);
		}
		foreach($produits_ajoutes as $produit) {
			
			$id_produit = $produit['fk_article']; 
			// on incremente le total avec les produits qui ont été ajoutés...
			$total += $produit['prix_unitaire']*$_SESSION['panier'][$id_produit];
		}
		return $total;
		
	}
	
	
	// methode pour ajouter un produit dans le panier
	public function add($product_id){
		// si le produit a deja été ajouté, on va jouer sur la quantité en incrémentant, sinon, on l'ajoute
		if(isset($_SESSION['panier'][$product_id])) {
			$_SESSION['panier'][$product_id]++;
		}
		else {
			$_SESSION['panier'][$product_id] = 1;
		}
		
	}
	
	// methode qui sert à supprimer un article du panier
	public function del($product_id) {
		unset($_SESSION['panier'][$product_id]);
	}
	
	
}


class image {

		public $img;
		public $chemin;

		public function __construct($img,$chemin){
			$this->img=$img;
			$this->chemin=$chemin;
		}

		public function insererImage(){
			
			
				move_uploaded_file($this->img,$this->chemin);
			
		
		}
	}


?>