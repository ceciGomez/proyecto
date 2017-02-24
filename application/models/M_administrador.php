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

		$operadores =$this->db->get("usuariosys")->result();
		return $operadores;
	}

	public function getEscribanos(){

		$escribanos =$this->db->get("usuarioescribano")->result();
		return $escribanos;
	}

	public function getUnOperador($idUsuario)
	{
		try {
			$query = $this->db->query("
				SELECT *
				FROM usuariosys u
				where u.idUsuario = $idUsuario
				");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}	
		}

	public function actualizarOperador($operador,$id)
	{
		try{
			$this->db->where('idUsuario',$id);
			return $this->db->UPDATE('usuariosys',$operador);

			} catch (Exception $e) {
			return false;
		}

		}
	}


