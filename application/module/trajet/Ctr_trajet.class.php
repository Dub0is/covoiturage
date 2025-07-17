<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_trajet extends Ctr_controleur implements I_crud {

    public function __construct($action) {
        parent::__construct("trajet", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Trajet();
		$data=$u->selectAll();
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit() {		
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u=new Trajet();
		if ($id>0)
			$row=$u->select($id);
		else
			$row=$u->emptyRecord();
			
		extract(array_map("mhe",$row));	
		require $this->gabarit;		
	}

	//	$_GET["id"] : id du trajet	
	function a_inscrit() {		
		//récupérer les infos du trajet $id
		$id = $_GET["id"];
		$u=new Trajet();
		$row=$u->select($id);					
		extract(array_map("mhe",$row));	

		//requete pour récuperér la liste des inscrits
		$liste = Inscrire::getInscrits($id);
		
		require $this->gabarit;		
	}

	//$_POST
	function a_save() {
		if (isset($_POST["btSubmit"])) {
			$u=new Trajet();
			$u->save($_POST);
			if ($_POST["tra_id"]==0)
				$_SESSION["message"][]="Le nouvel enregistrement Trajet a bien été créé.";
			else
				$_SESSION["message"][]="L'enregistrement Trajet a bien été mis à jour.";
		}
		header("location:" . hlien("trajet"));
	}

	

	//param GET id 
	function a_delete() {
		if (isset($_GET["id"])) {
			$u=new Trajet();
			$u->delete($_GET["id"]);
			$_SESSION["message"][]="L'enregistrement Trajet a bien été supprimé.";
		}
		header("location:" . hlien("trajet"));
	}

}

?>