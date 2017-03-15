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
 			
 			$query = $this->db->query("
				SELECT m.idMinuta, e.estadoMinuta, e.motivoRechazo, ue.idEscribano,
				concat(substring(m.fechaIngresoSys, 6, 2), '/' ,substring(m.fechaIngresoSys, 9, 2) , '/', substring(m.fechaIngresoSys, 1, 4)) as fechaIngresoSys,
				
				concat(substring(e.fechaEstado, 6, 2), '/' ,substring(e.fechaEstado, 9, 2) , '/', substring(e.fechaEstado, 1, 4)) as fechaEstado,
				p.circunscripcion, p.seccion, p.chacra, p.quinta, p.fraccion, p.manzana, p.parcela, p.nroMatriculaRPI, p.planoAprobado,
				l.nombre as localidad
						
						from minuta m inner join estadominuta e on m.idMinuta = e.idMinuta
						inner join usuarioescribano ue on ue.idEscribano = m.idEscribano
						inner join parcela p on p.idMinuta = m.idMinuta
						inner join localidad l on l.idLocalidad = p.idLocalidad 
						where ue.idEscribano = '$idEscribano'
						and cast(m.fechaIngresoSys as DATE) between '$fechaDesde' and '$fechaHasta'                   
					    and e.fechaEstado = (SELECT MAX(ee.fechaEstado) 
					    						from estadominuta ee 
					    						where  m.idMinuta = ee.idMinuta )  
					ORDER BY `e`.`estadoMinuta` ASC, m.idMinuta ASC
 				");
 			return $query->result();
 		} catch (Exception $e) {
 			return FALSE;
 		}
 	}
	
}
  