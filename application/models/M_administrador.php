<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_administrador extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
	}

	public function getOperadores(){

		$operadores =$this->db->get("usuarioSys")->result();
		return $operadores;
	}

	public function getEscribanos(){

		$escribanos =$this->db->get("usuarioEscribano")->result();
		return $escribanos;
	}
}