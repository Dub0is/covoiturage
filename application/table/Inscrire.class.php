<?php
/**
Classe créé par le générateur.
*/
class Inscrire extends Table {
	public function __construct() {
		parent::__construct("inscrire", "ins_id");
	}

	//retourne tous les inscrits d'un trajet
	static public function getInscrits($tra_id) {
		$sql="select * from inscrire,utilisateur where ins_utilisateur=uti_id and ins_trajet=:id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":id", $tra_id);
		$statement->execute();
		return $statement->fetchAll();
	}
}
?>
