<?php
class Offre
{
	//attributs
	protected $id_offre;
	protected $nom;
	protected $nbre_pt_fid;
	protected $debut_offre;
	protected $fin_offre;
	protected $description;
	
	//constructeur
	function __construct($nom,$nbre_pt_fid,$debut_offre,$fin_offre,$description)
	{
		//$this->id_offre=$id_offre;
		$this->nom=$nom;
		$this->nbre_pt_fid=$nbre_pt_fid;
		$this->debut_offre=$debut_offre;
		$this->fin_offre=$fin_offre;
		$this->description=$description;
	
	}
function getNom(){
		return $this->nom;
	}
	function getId_offre(){
		return $this->id_offre;
	}
	function getNbre_pt_fid(){
		return $this->nbre_pt_fid;
	}
	function getDebut_offre(){
		return $this->debut_offre;
	}
	function getFin_offre(){
		return $this->fin_offre;
	}
function getDescription(){
		return $this->description;
	}
	
}


?>