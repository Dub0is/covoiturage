<?php

class Ctr_recherche extends Ctr_controleur
{

	public function __construct($action)
	{
		parent::__construct("recherche", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		header("location" . hlien());
	}
	//retourne les catégorie d'hotel
	function a_rechercher()
	{	
		$categorie = Categorie_hotel::Categorie();
		require $this->gabarit;
	}
	//para: $recherche - retourne tout les hotels de $recherche
	function a_ajax_hotel()
	{	
		extract($_GET);
		$listeHotel = Hotel::rechercher($recherche);
		echo json_encode($listeHotel);
	}
	//para: $categorie - retourne tout les hotels pour chaque categorie
	function a_ajax_cat_hotel()
	{
		extract($_GET);
		$listeHotel = Hotel::rechercherCategorie($categorie);
		echo json_encode($listeHotel);
	}
	function a_ajax_service()
	{
		extract($_GET);
		$listeService = Hotel::getService($hot_id);
		echo json_encode($listeService);
	}
}
