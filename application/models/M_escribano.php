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
					SELECT m.idMinuta as idMinuta, idEscribano, 
concat(substring(fechaIngresoSys, 6, 2), '/' ,substring(fechaIngresoSys, 9, 2) , '/', substring(fechaIngresoSys, 1, 4)) as	fechaIngresoSys, fechaEdicion, 
					x.idEstadoMinuta as idEstadoMinuta, em.estadoMinuta as estadoMinuta, em.motivoRechazo as motivoRechazo, em.idUsuario as idUsuario
					from Minuta m inner join 
					(select idMinuta, max(idEstadoMinuta)  as idEstadoMinuta from EstadoMinuta group by idMinuta) as x
					on x.idMinuta = m.idMinuta left join EstadoMinuta em 
					on em.idEstadoMinuta = x.idEstadoMinuta and em.idMinuta = x.idMinuta 
					order by m.idMinuta
				  	");
			return $query->result();
		 } catch (Exception $e) {
			return false;
		} 
	}
	public function getUnaMinuta($idMinuta)
	{
		try {
			$query = $this->db->query("
				SELECT idMinuta, idEscribano, idUsuario, fechaIngresoSys, fechaEdicion
				FROM Minuta m
				where m.idMinuta = $idMinuta
				");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	
		}
}


