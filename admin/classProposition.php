<?php
class Proposition
{
	//attributs
	protected $id_prop;
	protected $contenu;
    protected $cin;
    protected $login;
	
	//constructeur
	function __construct($contenu)
	{
		//$this->id_prop=$id_prop;
		$this->contenu=$contenu;
		
	
	}
function getContenu(){
		return $this->contenu;
	}
	function getId_Prop(){
		return $this->id_prop;
	}
	
}

?>