<?php
/**
Classe créé par le générateur.
*/
class Trajet extends Table {
	public function __construct() {
		parent::__construct("trajet", "tra_id");
	}

	/**
	 * Retourne tous les enregistrements de la table
	 * 
	 * @return array
	 */
	public function selectAll(): array
	{
		$sql = "select * from trajet,utilisateur where tra_fournisseur=uti_id order by tra_date_heure_depart";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}
}
?>
