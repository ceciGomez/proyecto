<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_operador extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
	}

	public function getEscribanos(){

		$escribanos =$this->db->get("usuarioescribano")->result();
		return $escribanos;
	}



	public function actualizarEscribano($escribano,$id)
	{
		try{
			$this->db->where('idEscribano',$id);
			return $this->db->UPDATE('usuarioEscribano',$escribano);

			} catch (Exception $e) {
			return false;
		}

		}
	}


