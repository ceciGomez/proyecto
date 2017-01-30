<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_escribano extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
	}

	public function getMinutas(){
		try {
			$query= $this->db->query("
				SELECT   m.idMinuta as idMinuta, idEscribano, fechaIngresoSys, fechaEdicion, idEstadoMinuta, estadoMinuta, motivoRechazo, fechaEstado, e.idUsuario  as idUsuario
				FROM Minuta m INNER JOIN EstadoMinuta e on m.idMinuta = e.idMinuta 
			  	");
			return $query->result();
		 } catch (Exception $e) {
			return false;
		} 
	}
}