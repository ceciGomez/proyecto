<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
 class M_reportes extends CI_Model
 {
 	
 	public function getMinutasPorFecha($fechaDesde, $fechaHasta, $idEscribano)
 	{
 		try {
 			//$var ="entra a consulta:";
 			//var_dump($var, $fechaDesde, $fechaHasta, $idEscribano);
 			$query = $this->db->query("
				SELECT m.idMinuta, e.estadoMinuta, e.fechaEstado, e.motivoRechazo, ue.idEscribano, m.fechaIngresoSys, m.fechaEdicion
					from minuta m inner join estadominuta e on m.idMinuta = e.idMinuta
					inner join usuarioescribano ue on ue.idEscribano = m.idEscribano
					where ue.idEscribano = '$idEscribano'
					and cast(m.fechaIngresoSys as DATE) between '$fechaDesde' and '$fechaHasta'
 				");
 			return $query->result();
 		} catch (Exception $e) {
 			return FALSE;
 		}
 	}
	
}
  