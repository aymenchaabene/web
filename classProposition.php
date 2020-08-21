<?php
class Proposition
{
	//attributs
	protected $id_prop;
	protected $contenu;
 //   protected $cin;
	protected $image;
protected $date_prop;
	
	//constructeur
	function __construct($contenu,$image,$date_prop)
	{
		//$this->id_prop=$id_prop;
		$this->contenu=$contenu;
		//	$this->cin=$cin;
			$this->image=$image;
		$this->date_prop=$date_prop;
	
	}
function getContenu(){
		return $this->contenu;
	}
	function getId_Prop(){
		return $this->id_prop;
	}
		function getImage(){
		return $this->image;
	}	function getDate_prop(){
		return $this->date_prop;
	}
}

?>